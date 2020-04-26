<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    // Table Name
    protected $table = 'authors';

    // Primaray Key
    public $primaryKey = 'id';
 
    // Timestaps
    public $timestamps = true;
}
