<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RegisteredUserController;
use App\Http\Controllers\Api\GrievanceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/google/callback', [RegisteredUserController::class, 'googleLogin']);
Route::post('login', [RegisteredUserController::class, 'login'])->name('login');
Route::post('store-citizen', [RegisteredUserController::class, 'store_citizen'])->name('store-citizen');
// Route::post('store-retailer', [RegisteredUserController::class, 'store_retailer'])->name('store-retailer');
Route::post('forgot-password', [RegisteredUserController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password-verify-otp', [RegisteredUserController::class, 'forget_password_verify_otp'])->name('forgot-password-verify-otp');
Route::post('reset-password', [RegisteredUserController::class, 'resetpassword'])->name('reset-password');
// Route::get('/retailer_list',[RegisteredUserController::class, 'all_retailer_list']);

Route::post('register-verify-otp', [RegisteredUserController::class, 'register_verify_otp'])->name('register-verify-otp');

Route::post('/edit-citizen-profile',[RegisteredUserController::class, 'edit_citizen_profile']);
Route::post('/edit-retailer-profile',[RegisteredUserController::class, 'edit_retailer_profile']);
Route::post('/change-user-password',[RegisteredUserController::class, 'change_password']);

Route::get('/grievance-lists',[GrievanceController::class, 'grievance_lists']);