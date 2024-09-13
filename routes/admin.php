
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ReservationController;

Route::get('/', [AdminController::class, 'index'])->name('admin');
Route::prefix('car')->group(function(){
    Route::get('/',[CarController::class, 'index'])->name('car.index');
    Route::get('create', [CarController::class, 'create'])->name('car.create');
    Route::delete('delete/car/{id}',[CarController::class, 'destroy'])->name('car.destroy');
    Route::get('update/{car}',[CarController::class, 'edit'])->name('car.edit');
});
Route::prefix('reservation')->group(function(){
Route::get('/',[ReservationController::class, 'index'])->name('reservation');
});
Route::get('/contact',[AdminController::class, 'contact'])->name('contact.list');

