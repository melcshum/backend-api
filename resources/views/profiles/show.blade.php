@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2> Profile </h2>
        <div class="ml-auto align-items-right">
            <a href="{{ route('profiles.index') }}" class="btn btn-outline-secondary">Back to all Profiles</a>
        </div>
    </div>


@stop

@section('content')


    <div class="card">
        <div class="card-body">

            <div class="mt-2"> <strong>Name</strong> {{ $profile->name }}</div>


        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
