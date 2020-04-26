<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
   // Table Name
   protected $table = 'bills';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
