<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\videos;
use Illuminate\Support\Facades\Auth;
class screatevideo extends Controller
{
		public function __construct()
	{
		$this->middleware('auth');
	}
    public function index()
    {
    	$id = Auth::user()->id;
    	$videos = videos::where('creator_id',$id)->paginate(4);
    	return view('screate.video',compact('videos'));
    }
}
