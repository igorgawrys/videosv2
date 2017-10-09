@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	@if($count==0)
        	<div class="panel panel-default">
        		<div class="panel-body">
        			<center><h4>Nie znaleziono takiego profilu</h4></center>
        		</div> 
        	</div>
        	@else
        	@foreach($profil as $profil)
  <script>
  	$('body').css("background-image",'url("{{asset("$profil->bgi")}}")')
  </script>
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="media">
  <div class="media-left">
      <img class="media-object img-circle" src="{{asset($profil->images)}}" width='80'>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><h3>{{$profil->name}}</h3></h4>
    @if(Auth::user())
    @if($profil->name==Auth::user()->name)
    <div class="btn-group">
                  <a href="" class="btn btn-default">Edytuj profil</a>    
             <a href="" class="btn btn-default">Dodaj wideo</a>      
                <a onclick='link()' class="btn btn-default">Link do profilu</a>  
                <div class="input">
                	
                </div>
                <script>
               function link()
               {
               	if($('.input').html()=='<input type="text" class="form-control" value="{{route("profil.show",$profil->id)}}" disabled="disabled">')
               	{
               		 $('.input').html("");
               	}
             else
             {
             	 $('.input').html("<input type='text' class='form-control' value='{{route('profil.show',$profil->id)}}' disabled='disabled'>");
             }
               }
                </script>
                  </div>
    @endif
    @endif
  </div>
</div>
                </div>
            </div>
            <div class="panel panel-default">
            	<div class="panel-body">
            		@if(DB::table('videos')->where('creator_id',$profil->id)->count()==0)
            		<center><h4>Ten profil nie ma żadnych wideo</h4></center>
            		@else
            		            			<div class="row">
@foreach(DB::table('videos')->where('creator_id',$profil->id)->paginate(4) as $video)
	<div class="col-md-6">
        <div class="panel panel-default">
  <div class="panel-body">
  <center><h3>{{$video->name}}</h3></center>
 <center><img src="{{asset($video->images)}}" width='300'></center>
 <br/>
 <center><a class='btn btn-primary btn-block' href="{{route('watch.show',$video->id)}}">Obejrzyj</a></center>
  </div>
  </div>
  </div>
@endforeach
</div>
@endif
            @endforeach
            <center>{{DB::table('videos')->where('creator_id',$profil->id)->paginate(4)->links()}}</center>
            @endif
        </div>
    </div>
</div>
@endsection
