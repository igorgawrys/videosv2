<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\videos;
use App\User;
use Illuminate\Support\Facades\DB;
class search extends Controller
{
    public function index()
    {
    	if(isset($_GET['q']))
    	{
    		$q = $_GET['q'];
    	$searchn = videos::where('name', 'LIKE', "%$q%")->count();
    	if($searchn==0)
    	{
    		$count = videos::where('description', 'LIKE', "%$q%")->count();
    		if($count==0)
    		{
    			$searchn =  videos::where('description', 'LIKE', "%$q%")->count();
    		}
    		else
    		{
    				$searchd = videos::where('description', 'LIKE', "%$q%")->paginate(4);
    		}
    	}
    else
    {
    		$searchn = videos::where('name', 'LIKE', "%$q%")->paginate(4);
    }
    		return view('search',compact('searchn','q'));
    	}
    	else
    	{
    		$searchn = videos::paginate(4);
    			return view('search',compact('searchn','q'));
    	}
    }
}
