@extends('layouts.app')
@section('content')
<div class="col-lg-2">
<div class="navbar-default sidebar" role="navigation" style='border-right:1px solid #f2f3f4;'>
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                     
                        <li>
                            <a href="{{route('screate.index')}}" class="active"><i class="fa fa-dashboard fa-fw"></i>Panel główny</a>
                        </li>
                         <li>
                            <a href="{{route('screatevideo.index')}}" class="active">Wideo</a>
                        </li>
                        <li>
                        	<a href="" onclick="alert('Fukcja w realizcji...')">Tramismisja na żywo</a>
                        </li>
                          <li>
                            <a href="{{route('screatesettings.index')}}" class="active">Ustawienia</a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            </div>
            <div class="col-lg-10" style=''>
             @yield('body')
             </div>
            @endsection