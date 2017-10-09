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
    public function index()
    {
        echo "Hello world";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    
}
