<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('readPersonne',[
    "as" => "readPersonne",
    "uses" =>"APIcontroller@readPersonne"
]);
Route::Post('insertPersonne/{address}/{streetName}/{state}/{phoneNumber}',[
    "as" => "insertPersonne",
    "uses" =>"APIcontroller@insertPersonne"
]);
Route::delete('deletePersonne/{id}',[
    "as" => "deletePersonne",
    "uses" =>"APIcontroller@deletePersonne"
]);
Route::put('updatePersonne/{id}/{address}/{streetName}/{state}/{phoneNumber}',[
    "as" => "updatePersonne",
    "uses" =>"APIcontroller@updatePersonne"
]);