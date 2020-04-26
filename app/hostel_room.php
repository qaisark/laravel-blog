<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hostel_room extends Model
{
      // Table Name
   protected $table = 'hostel_rooms';

   // Primaray Key
   public $primaryKey = 'room_no';

   // Timestaps
   public $timestamps = true;

}
