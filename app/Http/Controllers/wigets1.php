<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class wigets1 extends Controller
{
    public function index()
    {

    }
    public function show($id)
    {


      if(DB::table('users')->where('id',$id)->count()==0)
      {
          return view('notfound');
      }
      else {

        $subscribesc = DB::table('subscribes')->where('profil_id',$id)->count();
  return view('wigets.show1',compact('subscribesc'));
      }

    }
}
