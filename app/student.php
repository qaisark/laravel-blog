<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{   
      // Table Name
   protected $table = 'students';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
