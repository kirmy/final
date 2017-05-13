@extends('layouts.app')
@section('content') 
		   
	<div class="container" id="rest-client" v-cloak>
		@forelse ($users as $user)
			<li>
				
				<a href="{{ route('users.show', ['user' => $user]) }}">
                        {{ $user->login }}
                </a>
				@if (is_null($user->profile))
					NULL
				@else
					{{ $user->profile->name }}
					{{ is_null($user->profile->email) }}
					{{ is_null($user->profile->name) }}
				@endif
				
			</li>
		@empty
			<p>No users</p>
		@endforelse
	</div>
            
    <hr>
@endsection