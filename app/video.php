<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    // Table Name
    protected $table = 'videos';

    // Primaray Key
    public $primaryKey = 'id';

    // Timestaps
    public $timestamps = true;
}