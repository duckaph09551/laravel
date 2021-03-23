<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::get('/',[CategoryController::class,'index'])->name('cate.index');
Route::delete('remove/{id}',[CategoryController::class,'remove'])->name('cate.remove');
//Route::get('/{id}/remove/',[CategoryController::class,'remove'])->name('cate.remove');
Route::post('/removeAll/',[CategoryController::class,'removeAll'])->name('cate.removeAll');
Route::get('/{id}/edit',[CategoryController::class,'edit'])->name('cate.edit');
Route::post('/edit-save',[CategoryController::class,'editSave'])->name('cate.edit-save');
Route::get('/add',[CategoryController::class,'add'])->name('cate.add');
Route::post('/add-save',[CategoryController::class,'addSave'])->name('cate.add-save');

Route::get('/read_delete',[CategoryController::class,'read_delete'])->name('cate.read_delete');
Route::get('/{id}/restore',[CategoryController::class,'restore'])->name('cate.restore');
Route::get('/{id}/permanterlyDelete',[CategoryController::class,'permanterlyDelete'])->name('cate.permanterlyDelete');


?>
