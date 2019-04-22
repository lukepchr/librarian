<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
      protected $guarded = [];

      public function complete($complete = true)
      {
          $this->update(['bought' => $complete]);
      }

}
