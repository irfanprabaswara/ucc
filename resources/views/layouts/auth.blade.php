@extends('layouts.app')

@section('page')

    {{--Region Content--}}
    @yield('content')

@endsection

@section('styles')
    <link href="{{ asset('auth/css/auth.css')}}" rel="stylesheet" id="bootstrap-css">
@endsection