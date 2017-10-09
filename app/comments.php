<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
      protected $fillable = [
        'content', 'id_video', 'id_ower'
    ];
}
