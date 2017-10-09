<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
     <link rel="shortcut icon"  href="{{ asset(config('app.favicon','img/favicon.jpg')) }}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{asset('css/font.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="//releases.flowplayer.org/7.1.2/skin/skin.css">
  <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="//releases.flowplayer.org/7.1.2/flowplayer.min.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
     <style>
        	#loading
        	{
        		display:none;
        		margin-top:350px;
        		text-align:center;
        		color:#4286f4;
        	}
        </style>
   <script type="text/javascript" charset="utf-8">
              $(document).ready(function(){
              	 $("#app").css('display','none')
              	 $('#loading').css('display','block');
              	setTimeout(function(){ 	$("#app").css('display','block'); $('#loading').css('display','none'); },300);
              })
          
              
           
        </script>
</head>
<body>
	  	<div id="loading" style=''>
    	<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
<span class="sr-only">Loading...</span>
    	</div>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                  
                   <a href="{{asset('')}}" class="navbar-brand">
                   
                        {{ config('app.name', 'Laravel') }}
                   </a>
                
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <form class="navbar-form navbar-left" action="{{route('search.index')}}">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Szukaj" name='q'>
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Zaloguj się</a></li>
                            <li><a href="{{ url('/register') }}">Zarejestruj się</a></li>
                        @else
                          <li><a href="{{route('profil.show',Auth::user()->id)}}"><img src="{{asset(Auth::user()->images)}}" alt="" width='20' class='img-circle'></a></li>

   <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} 
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                		<li><a href="{{route('profil.show',Auth::user()->id)}}" class=''><span class="fa fa-user"></span> Mój profil</a></li>
                                	<li><a href="" class=''><span class="fa fa-user-plus"></span> Edytuj profil</a></li>
                                	 	<li><a href="{{route('screate.index')}}" class=''>
                                	 		<i class="fa fa-cog" aria-hidden="true"></i>
                                	 		Studio twórców</a></li>
                                    <li>
                                    		<li><a href="{{route('profil.index')}}" class=''>
                                	 		<i class="fa fa-users" aria-hidden="true"></i>
                                	 		Profile</a></li>
                                    <li>
                                    	<li class="divider"></li>
                                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        	<i class="fa fa-sign-out fa-fw"></i>
                                            Wyloguj
                                        </a></li>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- Scripts -->
   <script src="//code.jquery.com/jquery-3.2.1.js"></script>
      <script src="{{ asset('js/app.js') }}"></script>

    <!-- Latest compiled and minified JavaScript -->
</body>
</html>