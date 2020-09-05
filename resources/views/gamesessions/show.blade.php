@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">

        <h3> Player Session <span class="text-muted"> ( {{ $game_session->session }} ) </span>at
            {{ $game_session->created_at }}</h3>
        <div class="ml-auto align-items-right">
            <a href="{{ route('profiles.show', $game_session->profile->id) }}" class="btn btn-outline-secondary">Back to
                Player</a>
        </div>
    </div>

@stop

@section('content')


    <div class="row">
        <div class="card">

            <div class="card-body">
                <div>

                    @include('gamesessiondatas._index', [
                    'interactions'=>$interactions,
                    'show_player' =>false,
                    'caption' => $game_session->profile->name
                    ])

                </div>


                <div>
                    {{ $interactions->links() }}
                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <game-object-history-count :sid="{{ $game_session->id }}"> </game-object-history-count>

        <session-difficulty :sid="{{ $game_session->id }}" ></session-difficulty>

        <scenario-average :sid="{{ $game_session->id }}" ></scenario-average>


    </div>
@stop



@section('css')

@stop

@section('js')
    <script>

    </script>
@stop
