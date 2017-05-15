<!-- resources/views/profiles/show.blade.php -->
@extends('layouts.app')
@section('content') 
<div class="container">
<!--
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('profiles') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('profiles') }}">View all profiles</a></li>
        <li><a href="{{ URL::to('profiles/create') }}">Create a profile</a>
    </ul>
</nav>
-->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Просмотр профиля {{ $profile->name }}</div>
                <div class="panel-body">                          
                            <p>
                               Имя <strong>{{ $profile->name }}</strong>
                            </p>
                            <p>
                                День рождения <strong>{{ $profile->birthday }}</strong>
                            </p>
							
                            <p>
                                E-Mail <strong>{{ $profile->email }}</strong>
                            </p>                                                  

                            <p>
                                Телефон <strong>{{ $profile->telefon }}</strong>
                            </p>                                                           

                            <p>
                                Адрес сайта
								<a href="{{ $profile->url }}">                                                                             
									<strong>{{ $profile->url }}</strong>
								</a>
                            </p>                       
                </div>
            </div>
        </div>
    </div>
</div>

@stop