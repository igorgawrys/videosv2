@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
	@foreach($comments as $comment)
	<div class='panel panel-default panel-body'>
		<h1>
		  <a href="{{route('profil.show',$comment->id_ower)}}"><img src='{{asset(DB::table('users')->where('id',$comment->id_ower)->value('images'))}}' width='40' class="img-circle"></img></a>		{{DB::table('users')->where('id',$comment->id_ower)->value('name')}}</h1>
			<textarea class='form-control'>{{$comment->content}}</textarea>
			<input class='btn btn-primary btn-block' value='Zapisz zmiany'>
</div>
	@endforeach
    </div>
  </div>
</div>
@endsection
