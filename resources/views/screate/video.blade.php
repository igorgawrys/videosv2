
@extends('screate.nav')
@section('body')
<div class="container">
            	<h3>Wideo</h3>
            	<hr>
            	<div class="row">
            		<a href="{{route('screateaddvideo.index')}}" class="btn btn-primary"><i class="fa fa-plus"></i> dodaj wideo</a>
            		@foreach($videos as $video)
            		<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="{{asset($video->images)}}" alt="..." width='40'>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">{{$video->name}}</h4>
   	<a href="" class="btn btn-warning">Edytuj</a>
   <a href="" class="btn btn-danger">Skasuj</a>
  </div>
</div>
<hr>
@endforeach
<center>{{$videos->links()}}</center>
            	</div>
            	</div>
@endsection