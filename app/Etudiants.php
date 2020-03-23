<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    protected $table="Etudiants";
    public $timestamps=false;
    protected  $fillable =["nom",
    "prenom",
    "pseudo",
    "email",
    "password",
    "code_fil",
    "profile"];
}
