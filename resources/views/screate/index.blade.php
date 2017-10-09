
@extends('screate.nav')
@section('body')
<div class="container">
            	<h3>Panel główny</h3>
            	<hr>

            <div class="row">
            	<div class="col-md-3">
            	<div class="panel panel-primary">
                <div class="panel-heading">
                Kto ostatnio cię subskrybował
              </div>
              <div class="panel-body">
                <ol>
            @foreach(DB::table('subscribes')->where('profil_id',Auth::user()->id)->orderBy('id','desc')->limit(3)->get() as $subscribe)
            <li>{{DB::table('users')->where('id',$subscribe->ower_id)->value('name')}}</li>
            @endforeach
              </div>
            	</div>
            </div>
            	<div class="col-md-3">
            	<div class="panel panel-danger">
            		<div class="panel-heading">
            		Ile masz subskrybcji?
            		</div>
                <div class="panel-body">
<bold>
  Masz {{DB::table('subscribes')->where('profil_id',Auth::user()->id)->count()}} trzech subskrybentów
  <div class="btn btn-danger" onclick='link()'>
Licznik subskrybentów
  </div>
  <div class="input">

  </div>
  <script>
  function link()
  {
  if($('.input').html()=='Klasyczny:<input type="text" class="form-control" value="{{route("wigets1.show",Auth::user()->id)}}" disabled="disabled">Green:<input type="text" class="form-control" value="{{route("wigets2.show",Auth::user()->id)}}" disabled="disabled">')
  {
     $('.input').html("");
  }
  else
  {
  $('.input').html('Klasyczny:<input type="text" class="form-control" value="{{route("wigets1.show",Auth::user()->id)}}" disabled="disabled">Green:<input type="text" class="form-control" value="{{route("wigets2.show",Auth::user()->id)}}" disabled="disabled">')
  }
  }
  </script>
</bold>
                </div>
            	</div>
            </div>
            	<div class="col-md-3">
            	<div class="panel panel-warning">
            		<div class="panel-heading panel-body">
            			<h4>Fukcja w realizacji...</h4>
            		</div>
            	</div>
            </div>
            	<div class="col-md-3">
            	<div class="panel panel-info">
            		<div class="panel-heading panel-body">
            			<h4>Fukcja w realizacji...</h4>
            		</div>
            	</div>
            </div>
            </div>
            </div>
@endsection
