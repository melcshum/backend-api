@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2> Game</h2>
        <div class="ml-auto align-items-right">
            <a href="{{ route('games.index') }}" class="btn btn-outline-secondary">Back to all
                Ganes</a>
        </div>
    </div>


@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-2"> <strong>Name</strong> {{ $game->name }}</div>
                        <div class="mt-2"><strong> Description</strong> {{ $game->desc }}</div>
                        <div class="mt-2"><strong> Purpose</strong> {{ $game->purpose }}</div>
                    </div>
                </div>
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
