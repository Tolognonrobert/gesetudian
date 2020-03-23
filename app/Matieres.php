<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matieres extends Model
{
    protected $table="Matieres";
    public $timestamps=false;
    protected  $fillable =["code_mat",
    "lib_mat"];
   
}
