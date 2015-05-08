@extends('emails.email')

@section('content')
    <h3>Password reset request</h3>
    <p>Click <a href="{{ url('password/reset/'.$token) }}">here to reset your password</a></p>
@endsection