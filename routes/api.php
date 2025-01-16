<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']); // Lister tous les utilisateurs
        Route::get('/{id}', [UserController::class, 'show']); // Afficher un utilisateur spécifique
        Route::post('/', [UserController::class, 'store']); // Créer un nouvel utilisateur
        Route::put('/{id}', [UserController::class, 'update']); // Mettre à jour un utilisateur
        Route::delete('/{id}', [UserController::class, 'destroy']); // Supprimer un utilisateur
    });});
