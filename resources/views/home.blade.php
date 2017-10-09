@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                	<script>
                	setTimeout(redirect(),10000);
                	function redirect()
                	{
                		location.href='{{asset("")}}';
                	}
                	</script>
<center>Za chwilę zostaniesz przekierowany na stronę główną...</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
