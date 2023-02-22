<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CapitalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\P_TransactionController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionNavigationController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
  return view('auth.login');
});





Auth::routes();

$controller_path = 'App\Http\Controllers';

Route::get('lang/{locale}', $controller_path . '\language\LanguageController@swap');


Route::middleware(['auth', 'user-role:cashier'])->group(function(){

  Route::get('cashier', [App\Http\Controllers\HomeController::class, 'cashierIndex'])->name('cashier');

  // Purchase route
  Route::resource('cashier/purchase', PurchaseController::class, ['names' => 'purchase']);

  // invoice routes
  Route::resource('cashier/invoice', InvoiceController::class, ['names' => 'invoice']);

});


Route::middleware(['auth', 'user-role:admin'])->group(function() {

  $controller_path = 'App\Http\Controllers';
  // Main Page Route

  Route::get('home', [HomeController::class, 'index'])->name('home');
  Route::get('/', [HomeController::class, 'index'])->name('home');

  Route::get('account', [CapitalController::class, 'index'])->name('account');

  Route::resource('admin/transactionNaviagtion', TransactionNavigationController::class, ['names' => 'transactionNaviagtion']);
  Route::resource('admin/transactions', TransactionController::class, ['names' => 'transaction']);
  Route::resource('admin/partnersTransaction', P_TransactionController::class, ['names' => 'partnersTransaction']);

  // assets
  Route::resource('admin/assets', AssetController::class, ['names' => 'assets']);

  // partners
  Route::resource('admin/partners', PartnersController::class, ['names' => 'partner']);

  // labour
  Route::resource('admin/labours', LabourController::class, ['names' => 'labour']);

  // labour
  Route::resource('admin/salaries', SalaryController::class, ['names' => 'salary']);

  // supplier route
  Route::resource('admin/suppliers', SupplierController::class, ['names' => 'supplier']);

  // customer route
  Route::resource('admin/customers', CustomerController::class, ['names' => 'customer']);

  // customer Type route
  Route::resource('admin/customerstypes', CustomerTypeController::class, ['names' => 'customerstypes']);

  // category route
  Route::resource('admin/category', CategoryController::class, ['names' => 'category']);

  // product route
  Route::resource('admin/product', ProductController::class, ['names' => 'product']);

  // brand route
  Route::resource('admin/brand', BrandController::class, ['names' => 'brand']);

  // unit route
  Route::resource('admin/unit', UnitController::class, ['names' => 'unit']);

  // Purchase route
  Route::resource('admin/purchase', PurchaseController::class, ['names' => 'purchase']);

  //expense
  Route::resource('admin/expense', ExpenseController::class, ['names' => 'expense']);

  // invoice routes
  Route::resource('admin/invoice', InvoiceController::class, ['names' => 'invoice']);

  // user routes
  Route::resource('admin/user', UserController::class, ['names' => 'user']);

  // report route
  Route::get('admin/reports/{type}', [HomeController::class, 'report'])->name('report');

  // category filter
  Route::get('admin/category/product/{id}', [PurchaseController::class, 'getProduct'])->name('product.get');


});
