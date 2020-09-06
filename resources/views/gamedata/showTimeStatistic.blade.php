@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">

        <h3> Game Statistic </h3>
        <div class="ml-auto align-items-right">
            {{-- <a href="{{ route('profiles.show', $game_session->profile->id) }}" class="btn btn-outline-secondary">Back to
                Player</a> --}}
        </div>
    </div>

@stop

@section('content')


    <div class="row">
        <div class="card">

            <div class="card-body">

                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <td> Name </td>
                            <td>
                                Default
                                Time Limit
                            </td>
                            <td>
                                Average
                                Time Taken
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($scenarios as $scenario)
                            <tr>
                                <td>
                                    {{ $scenario->name }}
                                </td>
                                <td>

                                    {{ $scenario->time_limit }}
                                </td>
                                <td>

                                    {{ $scenario->time_taken }}
                                </td>
                            </tr>
                        @empty
                            <tr colspan="5">
                                <td>
                                    <div class="alert alert-warning">
                                        <strong> Sorry</strong> There is no session available.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@stop



@section('css')

@stop

@section('js')
<script>

</script>
@stop
