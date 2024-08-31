
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\AdminController;

Route::get('/', [AdminController::class, 'index'])->name('admin');
Route::prefix('car')->group(function(){
    Route::get('/',[CarController::class, 'index'])->name('car.index');
    Route::delete('delete/car/{id}',[CarController::class, 'destroy'])->name('car.destroy');
});


