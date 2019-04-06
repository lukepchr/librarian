<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wish;

class WishController extends Controller
{

    public function update(Wish $wish){
      $wish->update([
        'bought' => request()->has('bought')
      ]);

      return back();
    }
}
