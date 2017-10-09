<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\videos;
class main extends Controller
{
    public function index()
    {
    	$videos = videos::paginate(6);
    	    	$count = videos::count();
    return view('main',compact('videos','count'));
    }
}
