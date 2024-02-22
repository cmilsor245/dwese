<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

use App\Http\Controllers\AuthController;

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

/* ----------------------------- esto a partir del login */

Route::post('register', [AuthController::class, 'register']); // localhost/api/register y le pones el body { "name": "test", "email": "test", "password": "12345" } -> la respuesta es un tocken de acceso y lo copiamos | hay que aceptar un header
Route::post('login', [AuthController::class, 'login']); // localhost/api/login y le pones el body { "email": "test", "password": "12345" } | hay que aceptar un header | copio el token devuelto

Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']); // localhost/api/logout | hay que aceptar un header | en la pestaña authorization se pega el token para que esta funcione porque tiene que tener el token

    Route::resource('/products', ProductsController::class);
});

// y ahora para hacer post por ejemplo en el bocy debe ir el usuario