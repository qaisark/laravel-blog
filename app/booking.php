<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    // Table Name
   protected $table = 'bookings';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;

   public function user()
   {
       return $this->hasMany('App\User');
   }
}
