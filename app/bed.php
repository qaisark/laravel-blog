<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bed extends Model
{
    // Table Name
    protected $table = 'beds';

    // Primaray Key
    public $primaryKey = 'bed_no';
 
    // Timestaps
    public $timestamps = true;
}
