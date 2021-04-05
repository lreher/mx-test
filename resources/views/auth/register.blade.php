@extends('layouts.app')

@section('content')
    <register csrf="{{ csrf_token() }}" validation_errors="{{ $errors }}"></register>

    @if (Session::get('message')) 
        <flash-notice type="success" message="{{ Session::get('message') }}"></flash-notice>
    @elseif (Session::get('error')) 
        <flash-notice type="danger" message="{{ Session::get('error') }}"></flash-notice>
    @endif
@endsection
