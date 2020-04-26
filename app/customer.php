<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
     // Table Name
   protected $table = 'customers';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
