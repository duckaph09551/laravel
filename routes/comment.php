<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


Route::get('list-comment',[CommentController::class,'index'])->name('comment.index');
Route::delete('/remove/{id}',[CommentController::class,'remove'])->name('comment.remove');
//Route::get('/{id}/remove/',[UserController::class,'remove'])->name('user.remove');
Route::post('/removeAll/',[CommentController::class,'removeAll'])->name('comment.removeAll');
Route::get('/{id}/edit',[CommentController::class,'edit'])->name('comment.edit');
Route::post('/edit-save',[CommentController::class,'editSave'])->name('comment.edit-save');






?>
