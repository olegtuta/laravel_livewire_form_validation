<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;

Route::get('/form', ValidationController::class);
