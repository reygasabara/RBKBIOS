@extends('layouts.master')

@push('head')
    <style>
        .vertical-center {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
@endpush

@section('title')
    Beranda
@endsection

@section('content')
    <section class="content vertical-center">
        <img src="{{ asset('img/welcome.png') }}" alt="" class="center-block">
    </section>
@endsection
