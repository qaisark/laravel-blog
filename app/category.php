<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
      // Table Name
   protected $table = 'categories';

   // Primaray Key
   public $primaryKey = 'id';

    // Timestaps
    public $timestamps = false;

    public function article()
   {
       return $this->belongsTo('App\article');
   }
}
