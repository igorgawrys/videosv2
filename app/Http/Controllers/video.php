<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\videos;
use Illuminate\Support\Facades\DB;
class video extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function show($id)
  {
  	$count= DB::table('videos')->where('id',$id)->count();
$videos =  DB::table('videos')->where('id',$id)->get();
return view('videos.index',compact('count','videos','id'));
  }
}
