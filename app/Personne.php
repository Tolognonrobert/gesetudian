<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $table="Personne";
    public $timestamps=false;
    protected  $fillable =['address',
    'streetName',
    'state',
    'phoneNumber'];
    
}
