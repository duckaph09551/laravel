<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('list-user',[UserController::class,'index'])->name('user.index');
Route::delete('/remove/{id}',[UserController::class,'remove'])->name('user.remove');
//Route::get('/{id}/remove/',[UserController::class,'remove'])->name('user.remove');
Route::post('/removeAll/',[UserController::class,'removeAll'])->name('user.removeAll');
Route::get('/{id}/edit',[UserController::class,'edit'])->name('user.edit');
Route::post('/edit-save',[UserController::class,'editSave'])->name('user.edit-save');


Route::get('/read_delete',[UserController::class,'read_delete'])->name('user.read_delete');
Route::get('/{id}/restore',[UserController::class,'restore'])->name('user.restore');
Route::get('/{id}/permanterlyDelete',[UserController::class,'permanterlyDelete'])->name('user.permanterlyDelete');




?>
