<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_check_in extends Model
{
   // Table Name
   protected $table = 'room_check_ins';

   // Primaray Key
   public $primaryKey = 'id';

   public $timestamps = false;
}
