<?php
namespace App\Http\Controllers;
use App\Http\Requests\PagesRequest;
use App\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class comments2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
      $this->middleware('auth');
     }
    public function index()
    {
      return view('comments.index');
    }
    public function store(request $request)
    {

    	$co = $request->all();
        $content = $co['content'];
          $id_video = $co['id_video'];
          if(DB::table('comments')->where('id_video',$id_video)->count()==0)
          {
          	echo "NIE PRAWIDŁOWE ID WIDEO";
          }
          else
          {
       DB::table('comments')->insert(['content' => $content,'id_ower' => Auth::user()->id,'id_video' => $id_video]);
            return back()->withInput();
          }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if(DB::table('comments')->where('id',$id)->count()==0)
      {
        return view('notfound');
      }
      else {
        $comments = DB::table('comments')->where('id',$id)->get();
return view('comments.show',compact('comments'));
      }
    }

    public function destroy($id)
    {
       $coms = DB::table('comments')->where('id',$id)->get();
       foreach($coms as $com)
       {
       	if($com->id_ower==Auth::user()->id)
       	{
       		DB::delete("delete from comments where id=$id");
       	}
       }
               return back()->withInput();
    }
public function edit($id)
{
  if(DB::table('comments')->where('id',$id)->count()==0)
  {
    return view('notfound');
  }
  else {
    $comments = DB::table('comments')->where('id',$id)->get();
return view('comments.edit',compact('comments'));
  }
}
}
