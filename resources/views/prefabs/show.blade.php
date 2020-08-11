@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2> Prefabs </h2>
        <div class="ml-auto align-items-right">
            <a href="{{ route('prefabs.index') }}" class="btn btn-outline-secondary">Back to all Prefabs</a>
        </div>
    </div>


@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="mt-2"> <strong>Name</strong> {{ $prefab->name }}</div>


                        <div class="mt-2"><strong> Boss can use</strong> {{ $prefab->boss_can_use }}</div>
                        <div class="mt-2"><strong> is_enabled </strong>{{ $prefab->is_enabled }}</div>
                        {{--
                        <div class="mt-4">
                            <strong> Prefabs</strong>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td> card_prefab_name</td>
                                        <td> boss_can_use </td>
                                        <td> is_enabled </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prefab->scenarios as $scenario)
                                        <tr>
                                            <td> {{ $scenario->card_prefab_name }}</td>
                                            <td> {{ $scenario->boss_can_use }} </td>
                                            <td> {{ $scenario->is_enabled }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        --}}
                    </div>
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
