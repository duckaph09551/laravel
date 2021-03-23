<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/',[PostController::class,'index'])->name('post.index');
//Route::get('/{id}/remove/',[PostController::class,'remove'])->name('post.remove');
Route::delete('/remove/{id}',[PostController::class,'remove'])->name('post.remove');
Route::post('/removeAll/',[PostController::class,'removeAll'])->name('post.removeAll');

Route::get('/{id}/edit',[PostController::class,'edit'])->name('post.edit');
Route::post('/edit-save',[PostController::class,'editSave'])->name('post.edit-save');
Route::get('/add',[PostController::class,'add'])->name('post.add');
Route::post('/add-save',[PostController::class,'addSave'])->name('post.add-save');

//Route::get('/read_delete',[ProductController::class,'read_delete'])->name('cate.read_delete');
//Route::get('/{id}/restore',[ProductController::class,'restore'])->name('cate.restore');
//Route::get('/{id}/permanterlyDelete',[ProductController::class,'permanterlyDelete'])->name('cate.permanterlyDelete');

?>
