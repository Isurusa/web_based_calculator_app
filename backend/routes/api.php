<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/calculation_store',[App\Http\Controllers\CalculationController::class, 'store']);