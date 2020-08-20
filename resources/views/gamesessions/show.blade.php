@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2> Session for individual student </h2>
        <div class="ml-auto align-items-right">
            <a href="{{ route('game_sessions.index') }}" class="btn btn-outline-secondary">Back to all Sessions</a>
        </div>
    </div>


@stop

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Session
                </div>
                <div class="card-body">
                    <div class="mt-2"> <strong>session</strong> {{ $game_session->session }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Event
                </div>
                <div class="card-body">
                    Sub
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
