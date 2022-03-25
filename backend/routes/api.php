<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Auth
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::post('courses', 'App\Http\Controllers\coursesController@store'); //crear curso
    Route::get('coursesList', 'App\Http\Controllers\coursesController@get'); //listar cursos
    Route::get('courseID/{id}', 'App\Http\Controllers\coursesController@getID'); //listar cursos
    Route::delete('coursesDel/{id}', 'App\Http\Controllers\coursesController@destroy'); //eliminar curso
    Route::put('coursesEdit/{id}', 'App\Http\Controllers\coursesController@update'); //editar curso

    Route::post('users', 'App\Http\Controllers\usersController@store'); //crear user
    Route::get('usersList', 'App\Http\Controllers\usersController@usersGet'); //listar users
    Route::get('userID/{id}', 'App\Http\Controllers\usersController@getID'); //listar users
    Route::delete('usersDel/{id}', 'App\Http\Controllers\usersController@destroy'); //eliminar users
    Route::put('usersEdit/{id}', 'App\Http\Controllers\usersController@update'); //editrar users

});

//Admin y Student
Route::group(['middleware' => ['jwt.verify']], function () {
    //Auth
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

    //Administrador
    Route::post('courses', 'App\Http\Controllers\coursesController@store'); //crear curso
    Route::get('coursesList', 'App\Http\Controllers\coursesController@get'); //listar cursos
    Route::get('courseID/{id}', 'App\Http\Controllers\coursesController@getID'); //listar cursos
    Route::delete('coursesDel/{id}', 'App\Http\Controllers\coursesController@destroy'); //eliminar curso
    Route::put('coursesEdit/{id}', 'App\Http\Controllers\coursesController@update'); //editar curso

    Route::post('users', 'App\Http\Controllers\usersController@store'); //crear user
    Route::get('usersList', 'App\Http\Controllers\usersController@usersGet'); //listar users
    Route::get('userID/{id}', 'App\Http\Controllers\usersController@getID'); //listar users
    Route::delete('usersDel/{id}', 'App\Http\Controllers\usersController@destroy'); //eliminar users
    Route::put('usersEdit/{id}', 'App\Http\Controllers\usersController@update'); //editrar users


    //Estudiante
    Route::get('coursesList', 'App\Http\Controllers\coursesController@get'); //listar cursos
    Route::get('courseID/{id}', 'App\Http\Controllers\coursesController@getID'); //listar cursos
    Route::get('userID/{id}', 'App\Http\Controllers\usersController@getID'); //listar users
});
