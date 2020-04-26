<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prev_bed_detail extends Model
{
    // Table Name
   protected $table = 'prev_bed_details';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
