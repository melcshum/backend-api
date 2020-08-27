@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2>Difficulty Traces</h2>
        <div class="ml-auto">
            <a href="{{ route('traces.index') }}"
                class="btn btn-outline-secondary">Back to Traces</a>
        </div>
    </div>
@stop

@section('content')

    <div class="card">



        <div class="card-body">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Scenario Difficulty rating</td>
                        <td>Player Difficulty rating for particular user (overall) </td>

                    </tr>
                </thead>
                <tbody>

                    @forelse ($iDefinitions as $iDefinition)
                        <tr>
                            <td>

                                {{ $iDefinition->id }}
                            </td>
                            <td>

                                {{-- {{ $iDefinition->name }} --}}
                                @php
                                   $name= explode("/", $iDefinition->name)[3];
                                   echo $name;
                                @endphp

                            </td>
                            <td>
                                {{ $iDefinition->interaction_object->scenario_difficulty->rating }}
                            </td>

                            <td>
                                {{ $iDefinition->interaction_object->player_difficulty->rating }}
                            </td>
                            {{-- <td>
                                {{ $iDefinition->interaction_object->player_difficulty }}
                            </td> --}}
                        </tr>
                    @empty
                        <tr colspan="5">
                            <td>
                                <div class="alert alert-warning">
                                    <strong> Sorry</strong> There is no trace available.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $iDefinitions->links() }}
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
