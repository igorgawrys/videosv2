	@extends('screate.nav')
@section('body')
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6 col-md-offset-3">
		  <form action="{{route('watch.store')}}" method='POST'>
		  	<label for="">Nazwa:</label>
		  	<input type="text" name="name" id="" class="form-control">
		  	<label for="">Opis:</label>
		  <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
		  <label for="">Plik wideo</label>
		  <input type="file" name="videos" id="" class="form-control">
		  <label for="">Miniatura</label>
		  <input type="file" name="images" id="" class="form-control">
		  <br/>
		  <input type="submit" value="Dodaj wideo" class="btn btn-primary btn-block">
		  </form>
		  </div>
		</div>
	</div>
	@endsection