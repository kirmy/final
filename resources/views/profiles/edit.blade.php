<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->login }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    
									@if (is_null(Auth::user()->profile))
									<li>		
										<a href="{{ route('profiles.create') }}"> 
                                            Создать профиль
                                        </a>	
									<li>	
									@else
									<li>		
										<a href="{{ route('profiles.edit', ['user' => Auth::user()]) }}"> 
                                            Редактировать профиль
                                        </a>										
																																						
										<a href="{{ route('profiles.destroy', ['user' => Auth::user()]) }}"
                                            onclick="event.preventDefault(); confirm_var = confirm('Удалить профиль \'{{ Auth::user()->profile->name }}\' ?');
													if (confirm_var) document.getElementById('profile-destroy-form').submit();">
                                            Удалить профиль
                                        </a>

                                        <form id="profile-destroy-form" action="{{ route('profiles.destroy', ['user' => Auth::user()]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
											{{ method_field('DELETE') }}
                                        </form>										
																				
                                    </li>
									@endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

		<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Редактирование профиля {{ $profile->name }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('profiles.update', $login) }}">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $profile->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">День рождения</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $profile->birthday }}">

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $profile->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefon') ? ' has-error' : '' }}">
                            <label for="telefon" class="col-md-4 control-label">Телефон</label>

                            <div class="col-md-6">
                                <input id="telefon" type="tel" class="form-control" name="telefon" value="{{ $profile->telefon }}">

                                @if ($errors->has('telefon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-4 control-label">Адрес сайта</label>

                            <div class="col-md-6">
                                <input id="url" type="url" class="form-control" name="url" value="{{ $profile->url }}">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group">
						
						<input id="addition2" type="text" class="form-control" name="addition2" value = "{{ $profile->addition }}">
						
						<!-- jQuery -->
				        <script src="//code.jquery.com/jquery.js"></script>
				        <!-- Bootstrap JavaScript -->
				        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
				        <!-- Vue.js -->
				        <script src="https://unpkg.com/vue"></script>
				        <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
						
						<!--<script src="../../ckeditor/ckeditor.js"></script>-->
						<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
						<!--<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
						<textarea name="addition" id="addition" rows="10" cols="80" style="visibility: visible">
							<--This is my textarea to be replaced with CKEditor.-->
						</textarea>
						<script>
						// Replace the <textarea id="editor1"> with a CKEditor
						// instance, using default configuration.
						var editor = CKEDITOR.replace( 'addition' );
						//var value = "{ $profile->addition }}";
						//console.log( value );
						editor.setData( "{!! $profile->addition !!}" );
						</script>
                        </div>
						<div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить
                                </button>
                            </div>
                        </div>											
						
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

		
		
    <!--    @yield('content') -->
    </div>

    <!-- Scripts
    <script src="{{ asset('js/app.js') }}"></script>-->
</body>
</html>