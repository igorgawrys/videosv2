@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
    <div class="row">
    	@if($count==0)
    	<center><h4>Aktulanie nie posiadamy żadnych wideo</h4></center>
    	@else
    	 	@foreach($videos as $video)
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
@endif
    </div>
    <center>{{$videos->links()}}</center>
    	</div>
    </div>
</div>
@endsection