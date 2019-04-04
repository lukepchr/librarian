<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
      'title',
      'author',
      'description',
      'notes',
      'lent'
]    ;

public function wishes()
{
    return $this->hasMany(Wish::class);
}

}
