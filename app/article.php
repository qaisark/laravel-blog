<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\article;

class article extends Model
{
    // Table Name
    protected $table = 'articles';

    // Primaray Key
    public $primaryKey = 'id';
 
    // Timestaps
    public $timestamps = true;
 
     public function category()
    {
        return $this->hasMany('App\category');
    }
}
