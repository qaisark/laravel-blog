<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class check_in extends Model
{
      // Table Name
   protected $table = 'check_ins';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
