@extends('layouts.app')
@section('content') 
		   
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
				</p>
			</li>
		@empty
			<p>No users</p>
		@endforelse
	</div>
            
    <hr>
@endsection