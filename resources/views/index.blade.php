@extends('layouts.app')

@section('content')

{{$user['user_addresses']}}
    <app user_model="{{$user}}"></app>
@endsection
