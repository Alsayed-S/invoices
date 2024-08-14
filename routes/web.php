<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('invoices',InvoicesController::class);
Route::resource('sections',SectionsController::class);
Route::resource('products',ProductsController::class);


Route::resource('InvoiceAttachments', InvoiceAttachmentsController::class);

Route::get('/section/{id}',[InvoicesController::class,'getproducts']);

Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'get_file']);

Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'open_file']);

Route::post('delete_file', [InvoicesDetailsController::class,'destroy'])->name('delete_file');
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class,'edit']);
Route::post('delete_file', [InvoicesDetailsController::class,'destroy'])->name('delete_file');
Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);
Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('Status_show');
Route::post('/Status_update/{id}', [InvoicesController::class,'Status_update'])->name('Status_update');
//Route::get('InvoicesDetails/{id}',[InvoicesController::class,'edit']);


Route::get('invoices_paid',[InvoicesController::class,'invoices_paid']);
Route::get('invoices_unpaid',[InvoicesController::class,'invoices_unpaid']);
Route::get('invoices_partial',[InvoicesController::class,'invoices_partial']);
Route::get('/{page}',[AdminController::class,'index']);


