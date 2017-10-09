@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-4">
    <div class="panel panel-default">
  		<div class="panel-body">
        <script type="text/javascript">
        $(document).ready(function(){
setTimeout(function(){location.reload()},60000);
        })
        </script>
        <center>
        <h1>Mam {{$subscribesc}} subskrybentów </h1>
<p>Subskrybujcie mnie</p>
</center>
      </div>
    </div>
  </div>
</div>
@endsection
