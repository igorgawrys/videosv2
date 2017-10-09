@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
	@foreach($comments as $comment)
	<div class='panel panel-default panel-body'>
		<h1>
		  <a href="{{route('profil.show',$comment->id_ower)}}"><img src='{{asset(DB::table('users')->where('id',$comment->id_ower)->value('images'))}}' width='40' class="img-circle"></img></a>		{{DB::table('users')->where('id',$comment->id_ower)->value('name')}}</h1>
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
	@endforeach
    </div>
  </div>
</div>
@endsection
