<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    // Table Name
    protected $table = 'documents';

    // Primaray Key
    public $primaryKey = 'id';

    // Timestaps
    public $timestamps = true;
}
