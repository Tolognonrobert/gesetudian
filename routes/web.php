<?php

/*
|--------------------------------------------------------------------------
| Voici l'endroit où vous pouvez inscrire des itinéraires web pour votre demande. Ces
| sont chargés par le RouteServiceProvider au sein d'un groupe qui
| contient le groupe de middleware "web". Maintenant, créez quelque chose de génial !
|

*/



//la racine
Route::get('/',[
    "as" => "index",
    "uses" =>"MainController@index"
]);
//la vue inscription
Route::get('inscription',[
    "as" => "inscription",
    "uses" =>"MainController@inscription"
]);
//la vue connexion
Route::get('connexion',[
    "as" => "connexion",
    "uses" =>"MainController@connexion"
]);
//traitement de la page connexion
Route::post('verification_connexion',[
    "as" => "verification_connexion",
    "uses" =>"MainController@verification_connexion"
]);
//traitement de la page inscription
Route::post('verification_inscription',[
    "as" => "verification_inscription",
    "uses" =>"MainController@verification_inscription"
]);
Route::get('dashboard',[
    "as" => "dashboard",
    "uses" =>"MainController@dashboard"
]);
Route::get('deleteNote',[
    "as" => "deleteNote",
    "uses" =>"MainController@deleteNote"
]);
Route::get('modifierNote',[
    "as" => "modifierNote",
    "uses" =>"MainController@modifierNote"
]);
Route::post('modifierNote_v',[
    "as" => "modifierNote_v",
    "uses" =>"MainController@modifierNote_v"
]);
Route::get('ajoutNote',[
    "as" => "ajoutNote",
    "uses" =>"MainController@ajoutNote"
]);
Route::get('profile',[
    "as" => "profile",
    "uses" =>"MainController@profile"
]);
Route::post('mProfile',[
    "as" => "mProfile",
    "uses" =>"MainController@mProfile"
]);
Route::get('logout',[
    "as" => "logout",
    "uses" =>"MainController@logout"
]);
Route::post('ajoutNote_m',[
    "as" => "ajoutNote_m",
    "uses" =>"MainController@ajoutNote_m"
]);
Route::get('downloadNote', [
    "as" => "downloadNote",
    "uses" =>"MainController@downloadNote"
]);
