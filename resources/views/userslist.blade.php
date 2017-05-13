@extends('layouts.app')
@section('content') 
		   
	<div class="container" id="rest-client" v-cloak>
		@forelse ($users as $user)
			<li>
				
				<a href="{{ route('users.show', ['user' => $user]) }}">
                        {{ $user->login }}
                </a>
				
				
			</li>
		@empty
			<p>No users</p>
		@endforelse
	</div>
            
    <hr>
@endsection