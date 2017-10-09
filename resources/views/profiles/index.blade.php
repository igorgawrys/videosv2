@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div class="panel panel-default panel-body">
  <div class="row">
  @foreach($profils as $profil)
  	<div class="col-md-6">
  		<div class="panel panel-default panel-body">
  			 <center><img src="{{asset($profil->images)}}" alt="" width='200' class='img-circle'></center>
  			<center><h3>{{$profil->name}}</h3></center>
        <div class="row">
        <div class="col-md-6">
<a href="{{route('profil.show',$profil->id)}}" class="btn btn-primary btn-block">Zobacz profil</a>
        </div>
        <div class="col-md-6">
<a href="" class="btn btn-primary">@if(DB::table('subscribes')->where('ower_id',Auth::user()->id)->where('profil_id',$profil->id)->count()==0)Subskrybuj @else Subskrybujesz @endif <div class="badge">{{DB::table('subscribes')->where('profil_id',$profil->id)->count()}}</div></a>
        </div>
  		</div>
              </div>
  	</div>
  @endforeach
        	</div>
        </div>
        </div>
</div>
@endsection
