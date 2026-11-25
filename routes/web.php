<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [UserController::class, 'home'])->name('index');
Route::get('/checkOut', [UserController::class, 'checkOut'])->name('user.checkOut');
Route::get('/dashboard',[UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user.dashboard');
Route::get('/addTocart/{id}',[UserController::class, 'addToCart'])->middleware(['auth', 'verified'])->name('addToCart');
Route::get('/allProducts',[UserController::class, 'allProducts'])->middleware(['auth', 'verified'])->name('allProducts');
Route::get('/viewCart',[UserController::class, 'viewCart'])->middleware(['auth', 'verified'])->name('viewCart');
Route::get('/viewProductDetails/{id}',[UserController::class,'viewProductDetail'])->middleware(['auth', 'verified'])->name('user.viewProduct');
Route::post('confirm_order',[UserController::class,'confirm_order'])->middleware(['auth', 'verified'])->name('confirm_order');
Route::get('/checkout',[UserController::class, 'checkOut'])->middleware(['auth', 'verified'])->name('checkOut');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::delete('/deleteItem/{cart}',[UserController::class, 'deleteItem'])->middleware(['auth', 'verified'])->name('user.deleteItem');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
   Route::get('/addCategory',[AdminController::class,'addCategory'])->name('admin.addCategory');
   Route::post('/addCategory',[AdminController::class,'storeCategory'])->name('admin.storeCategory');
   Route::get('/viewCategory',[AdminController::class,'viewCategory'])->name('admin.viewCategory');
   Route::delete('/deleteCategory/{category}',[AdminController::class,'deleteCategory'])->name('admin.deleteCategory');
   Route::get('/editCategory/{id}',[AdminController::class,'editCategory'])->name('admin.editCategory');
   Route::put('/updateCategory/{category}',[AdminController::class,'updateCategory'])->name('admin.updateCategory');
   Route::get('/viewCat/{id}', [AdminController::class,'viewCat'])->name('admin.viewCat');
   Route::get('/addProduct', [AdminController::class,'addProduct'])->name('admin.addProduct');
   Route::get('viewProduct', [AdminController::class,'viewProduct'])->name('admin.viewProduct');
    Route::post('storeProduct', [AdminController::class,'storeProduct'])->name('admin.storeProduct');
   Route::put('/updateProduct/{product}', [AdminController::class,'updateProduct'])->name('admin.updateProduct'); 
    Route::get('editProduct/{id}', [AdminController::class,'editProduct'])->name('admin.editProduct'); 
    Route::delete('/deleteProduct/{product}', [AdminController::class,'deleteProduct'])->name('admin.deleteProduct');
    Route::get('/showProdouct/{id}', [AdminController::class,'showProduct'])->name('admin.showProduct');
    Route::get('/addUser', [UserController::class,'addUser'])->name('admin.addUser');
    Route::post('/storeUser', [UserController::class,'storeUser'])->name('admin.storeUser');
    Route::get('/viewUser', [UserController::class,'viewUser'])->name('admin.viewUser');
   Route::delete('/deleteUser/{user}',[UserController::class,'deleteUser'])->name('admin.deleteUser');
   Route::post('/searchUser', [AdminController::class,'searchUser'])->name('admin.searchUser');
   Route::get('/editUser/{id}',[UserController::class,'editUser'])->name('admin.editUser');
  Route::post('/searchProduct',[AdminController::class,'searchProduct'])->name('admin.searchProduct');
  Route::put('/updateUser/{user}',[UserController::class,'updateUser'])->name('admin.updateUser');
  Route::get('/viewOrders', [AdminController::class, 'viewOrder'])->name('admin.viewOrder');
 

});

require __DIR__.'/auth.php';
