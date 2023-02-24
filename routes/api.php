<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/v1/login', LoginController::class);
Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::get('/appointment/list', [AppointmentController::class, 'index']);
    Route::post('/appointment/create', [AppointmentController::class, 'create']);
    Route::post('/appointment/reschedule', [AppointmentController::class, 'reschedule']);
    Route::post('/appointment/arrive', [AppointmentController::class, 'arrive']);
});

/* ● /api/v1/login
● /api/v1/appointment/list -> list all appointments
● /api/v1/appointment/create -> create new appointment
● /api/v1/appointment/reschedule -> to schedule a new appointment
● /api/v1/appointment/arrive -> to mark the appointment status as arrived at the hospital */
