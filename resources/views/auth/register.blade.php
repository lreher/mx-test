@extends('layouts.app')

@section('content')
    <register csrf="{{ csrf_token() }}"></register>

    {{ $errors }}
@endsection
