@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
    	 		 <div class="col-md-12">
        <div class="panel panel-default">
  <div class="panel-body">
 @if($count==0)
 <center><h4>Ten plik mógł zostać usunięty lub nie istnieje</h4></center>
 @else
<!--All code html !-->
@foreach($videos as $video)
<div class="flowplayer">
    <video>
      <source type="video/mp4" src="{{asset($video->videos)}}">
      </video>
  </div>
  <h3>{{$video->name}}</h3>
  <div class="panel panel-default">
	<div class="panel-body" id='video'>
		  <p class='tekst'>{{ str_limit($video->description, $limit = 100, $end = '...') }}</p>
	</div>
</div>
<a href='#video' onclick='exdent()' class='exedens2 glyphicon glyphicon-chevron-down btn btn-default' ></a>
<script>
function exdent()
{
$('.tekst').html("{{$video->description}}")
$('.exedens2').attr("class","exedens2 glyphicon glyphicon-chevron-up btn btn-default")
$('.exedens2').attr('onclick','mniej()');
}
function mniej()
{
	$('.tekst').html("{{ str_limit($video->description, $limit = 100, $end = '...') }}")
$('.exedens2').attr("class","exedens2 glyphicon glyphicon-chevron-down btn btn-default");
$('.exedens2').attr('onclick','exdent()');
}
</script>
<!--{{$get = DB::table('users')->where('id',$video->creator_id)->get()}}!-->
@foreach($get as $gets)
<br/>
<div class="media">
  <div class="media-left">
		<a href="{{asset('profil/'.$gets->id)}}"><img src='{{asset($gets->images)}}' width='40' class="img-circle"></img></a>
</div>
<div class="media-body" >
	<strong><h4>{{$gets->name}}</h4></strong>
	<strong><p>Opublikowano:{{$video->created_at}}</p></strong>
	@if(Auth::user())
	<a href="" class="btn btn-primary">@if(DB::table('subscribes')->where('ower_id',Auth::user()->id)->where('video_id',$video->id)->count()==0)Subskrybuj @else Subskrybujesz @endif <div class="badge">{{DB::table('subscribes')->where('video_id',$video->id)->count()}}</div></a>
	<br/>
	<a href="{{route('likedown.show',$video->id)}}"><i class="fa fa-thumbs-up" aria-hidden="true" style='font-size:40px'></i></a>
	<a href="{{route('likeup.show',$video->id)}}"><i class="fa fa-thumbs-down" aria-hidden="true" style='font-size:40px;'></i></a>
		@endif
</div>
</div>
<br/>
@if($video->adsens=='empty')
@else
<div class="panel panel-default">
  	<div class="panel-body">
  		<h6>Reklama:</h6>
  	{!!$video->adsens!!}
  	</div>
  </div>
@endif
<h4>Komentarze:</h4>
		@if(Auth::user())
<div class="panel panel-default">
	<div class="panel-body">
     <form class="" method="POST" action='{{route('comments.store')}}'>
     	           {{ csrf_field() }}
     	          
     	           <!--<input type="hidden" name="id_ower" value='{{Auth::user()->id}}'>!-->
     	           <input type="hidden" name="id_video" value='{{$video->id}}'>
		<textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder='Dodaj publiczny komentarz...'></textarea>
		<input type="submit" value="Skomentuj" class="btn btn-block btn-primary">
		</form>
	</div>
</div>
		@endif
@if(DB::table('comments')->where('id_video',$video->id)->count()==0)
<center><h4>Pod tym filmem nie ma żadnych komentarzy</h4></center>
@else
@foreach(DB::table('comments')->where('id_video',$video->id)->orderBy('id','desc')->paginate(6) as $comment)
<div class="panel panel-default">
	<div class="panel-body">
		<h3>
			@foreach(DB::table('users')->where('id',$comment->id_ower)->get() as $ower)
				<a href="{{route('profil.show',$ower->id)}}"><img src='{{asset($ower->images)}}' width='40' class="img-circle"></img></a>
			{{$ower->name}}
			@endforeach
		</h3>
		<p>{{$comment->content}}</p>
		@if(Auth::user())
			@if(Auth::user()->id==$comment->id_ower)
		<div class="dropdown">
  <button id="dLabel" type="button" class='btn btn-default' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel">
 <li><a href="{{route('comments.edit',$comment->id)}}">Edytuj</a></li>
  <li><a href=""><form action="{{route('comments.destroy',$comment->id)}}" method='POST' id='form1'>
  	{{ method_field('DELETE') }}
  	    {{ csrf_field() }}
  	<input type="submit" value="Usuń">
  </form></a></li>
  </ul>
</div>
		@endif
		@endif
	</div>
</div>
@endforeach
@endif
<center>{{DB::table('comments')->where('id_video',$video->id)->paginate(6)->links()}}</center>
@endforeach
@endforeach
 @endif
</div>
    </div>
</div>
@endsection