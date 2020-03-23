<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    protected $table="Composer";
    public $timestamps=false;
    protected  $fillable =["num_mat",
    "code_mat",
     "note"];
}
