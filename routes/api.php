<?php

use App\Http\Controllers\WidgetController;
use Illuminate\Support\Facades\Route;

Route::prefix('widgets')->group(function () {
    Route::get('', [WidgetController::class, 'index']);
    Route::get('{widget}', [WidgetController::class, 'get'])->name('widget.get');
    Route::post('', [WidgetController::class, 'store']);
    Route::patch('{widget}', [WidgetController::class, 'update'])->name('widget.update');
    Route::delete('{widget}', [WidgetController::class, 'delete'])->name('widget.delete');
});
