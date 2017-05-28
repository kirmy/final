<!-- resources/views/profiles/create.blade.php -->
@extends('layouts.app')
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Создание профиля</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

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
                                <input id="telefon" type="tel" class="form-control" name="telefon" value="{{ old('telefon') }}">

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
                                <input id="url" type="url" class="form-control" name="url" value="{{ old('url') }}">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group">  
                            <label for="image" class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<img id="image" src="" alt="Profile image" style="height:228px;display: block">
                                <!-- <input id="url" type="url" class="form-control" name="url" value="{{ old('url') }}">
								.image-wrapper {
								  padding: 5px;
								  border: 1px #ddd solid;
								  height auto;
								  width: 200px;
								} -->
								<!--<input id="image2" type="text" class="form-control" name="image2" value="">-->
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="imagefile" class="col-md-4 control-label">Загрузить изображение</label>

                            <div class="col-md-6">
								<input id="imagefile" type="file" class="form-control" name="imagefile" accept="image/*" value="">
                                @if ($errors->has('imagefile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imagefile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group">							
							<!--<script src="../../ckeditor/ckeditor.js"></script>-->
							<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
							<!--<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
							<textarea name="addition" id="addition" rows="10" cols="80" style="visibility: visible">
								<!--This is my textarea to be replaced with CKEditor.-->
							</textarea>
							<script>
							// Replace the <textarea id="editor1"> with a CKEditor
							// instance, using default configuration.
							var editor = CKEDITOR.replace( 'addition' );
							//var value = "";
							//console.log( value );
							//editor.setData( "" );
							</script>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Создать профиль
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