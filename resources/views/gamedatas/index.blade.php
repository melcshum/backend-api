@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2>Player Game Session History</h2>
        <div class="ml-auto">
            {{-- <a href="{{ route('scenarios.create') }}"
                class="btn btn-outline-secondary">Create scenario</a> --}}
        </div>
    </div>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            <ul class="list-group list-group-flush">
                @foreach ($interactions as $key => $value)
                    <div class="list-group-item">
                        <div>
                            {{-- {{ $key }} --}}
                            {{ $value->name }}
                            {{ $value->interaction_action->name }}
                            {{ $value->interaction_object->name }} at {{ $value->created_at }}
                            <div>
                                <strong> Defintion :</strong>{{ $value->interaction_object->interaction_defintion->name }}
                            </div>
                        </div>
                        <div>
                            <strong>Result </strong>
                            @foreach ($value->interaction_result->interaction_extensions as $extension)
                                </span> {{ $extension->name . ':' . $extension->value }} </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </ul>

            <example-component></example-component>

            <chart-component></chart-component>

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
