@extends('layouts.app')
@section('content') 
<!--@{{ $name }}		   -->

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
			<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>			
						<textarea name="editor1" id="editor1" rows="10" cols="80" style="visibility: visible">
							This is my textarea to be replaced with CKEditor.
						</textarea>
						<script>
						// Replace the <textarea id="editor1"> with a CKEditor
						// instance, using default configuration.
						CKEDITOR.replace( 'editor1' );
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

@stop