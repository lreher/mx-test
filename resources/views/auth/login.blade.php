@extends('layouts.app')

@section('content')

    {{ Session::get('message') }}

    <login csrf="{{ csrf_token() }}"></login>

    {{ $errors }}
@endsection
