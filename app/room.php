<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
     // Table Name
   protected $table = 'rooms';

   // Primaray Key
   public $primaryKey = 'room_no';

   // Timestaps
   public $timestamps = true;

   public function category()
   {
       return $this->belongsTo('App\category');
   }
}
