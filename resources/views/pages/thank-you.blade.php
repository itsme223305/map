@extends('layouts.app')
@section('content')
<div class="jumbotron text-center text-black blackground-green-lines">
    <h1 class="display-3">Thank You!</h1>
    <p class="text-center lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
    <hr>
    <p class="text-center">
        Having trouble? <a href="">Contact us</a>
    </p>
    <p class="lead text-center">
        <a class="btn btn-green btn-sm" href="{{route('home.get')}}" role="button">Continue to homepage</a>
    </p>
</div>
@endsection
