@extends('layouts.app')

@section('content')
<div class="container">
@if($searchn=='0')
            <div class="panel panel-default">
                <div class="panel-body">
                   <h4>Brak wyników dla:{{$q}}</h4>
                   </div>
                   </div>
                   @else
                   	<div class="panel panel-default">
		<div class="panel-body">
    <div class="row">
    	 	@foreach($searchn as $search)
    	 		 <div class="col-md-6">
        <div class="panel panel-default">
  <div class="panel-body">
  <center><h3>{{$search->name}}</h3></center>
 <center><img src="{{asset($search->images)}}" width='300'></center>
 <br/>
 <center><a class='btn btn-primary btn-block' href="{{route('watch.show',$search->id)}}">Obejrzyj</a></center>
  </div>
</div>
</div>
@endforeach
    </div>
    <center>{{$searchn->links()}}</center>
    	</div>
    </div>
                   @endif
</div>
@endsection
