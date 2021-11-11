<?php

use App\Http\Controllers\Api\v1\StorageplaceController;
use App\Http\Controllers\Api\v1\TicketController;
use Illuminate\Support\Facades\Route;


Route::get('/storageplaces', [StorageplaceController::class, 'index']);
Route::post('/storageplaces', [StorageplaceController::class, 'store']);

Route::post('/ticket', [TicketController::class, 'store']);
