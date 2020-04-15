<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canals extends Model {
    public $timestamps = false;
    protected $table = 'canal';
    protected $fillable = ['nom_canal'];
}	
?>