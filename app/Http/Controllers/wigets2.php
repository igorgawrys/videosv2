<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class wigets2 extends Controller
{
  public function index()
  {

  }
  public function show($id)
  {
  return view('wigets.show2');
  }
}
