<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//TODO: make all CRUD operations

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//
//
//

Route::post('users/', function () {
    return User::all();
});

Route::post('users/create/{name}/{email}', function ($name, $email) {
    return User::create([
        "name" => $name,
        "email" => $email
    ]);
});

Route::post('users/delete/{email}', function ($email) {
    return User::where('email', $email)->delete();
});

Route::post('users/update-name/{name}/{newName}', function ($name, $newName) {
    return User::where('name', $name)->update(["name" => $newName]);
});
