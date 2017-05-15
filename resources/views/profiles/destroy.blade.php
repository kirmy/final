<!--@extends('layouts.app')
@section('content') -->

<!DOCTYPE html> 
<html lang="{{ config('app.locale') }}">
<body>
<!--@{{ $name }}		   -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Удаление профиля {{ $profile->name }}</div>
				<button onclick="myFunction()">Try it</button>
                
            </div>
        </div>
    </div>
</div>

<script>
function myFunction() {
    confirm("Удалить профиль");
}
</script>
<!-- @endsection .$profile->name-->
</body>
</html>