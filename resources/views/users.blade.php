@extends('layouts.app')
@section('content') 
	<example></example>	   
	<div class="container" id="rest-client" v-cloak>
		@forelse ($users as $user)
			<li>
				<p class="text">
				<a href="{{ route('profiles.show', ['user' => $user]) }}">
                    {{ $user->login }}
                </a>
				@if (is_null($user->profile))
					Не заполнен
				@else
					{{ $user->profile->name }}
					{{ $user->id }}
					{{ Auth::id() }}

					@if(Auth::check())
						@if(Auth::id()!=$user->id)
							<div class="form-group">    
								<div class="col-md-8 col-md-offset-4">
									<input type="checkbox" onchange="togglelike('{{$user->login}}')" 
									{{ Auth::user()->likes()->find($user->id) ? 'checked="checked"': ''}}/> Профиль нравится                          
								</div>
							</div>
						@endif
					
						<form action="{{ route('profiles.update', $user->login) }}" method="POST" >
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-warning">
										Удалить профиль
									</button>
								</div>    
							</div>
						</form>
					@endif
				@endif
				</p>
			</li>
		@empty
			<p>No users</p>
		@endforelse
	</div>
            
    <hr>
	
	<script>
		function togglelike($login) {
			//alert($user);
			$.ajax({
			type: "POST",                                     //метод запроса, POST или GET (если опустить, то по умолчанию GET)
			url: "togglelike",                                //серверный скрипт принимающий запрос
			data: {login: $login, _token: "{{ csrf_token() }}"},        //можно передать строку с параметрами запроса, ключ=значение		   
			//data: {request:"message",request2:"message2"},  //можно передать js объект, ключ:значение
			//data: {request:["message #A", "message #B"],request2:"message2"},  //можно передать массив в одном из параметре запроса   
			//success: function(res) {                          //функция выполняется при удачном заверщение
			//	alert("Данные успешно отправлены на сервер");
			//}
			});
		}
	</script>
@endsection