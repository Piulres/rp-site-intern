<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return response()->json(['message' => 'Jobs API', 'status' => 'Connected']);;
});

Route::resource('jobs', 'JobsController');
Route::resource('companies', 'CompaniesController');

Route::post('auth/login', 'AuthController@authenticate');

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');
