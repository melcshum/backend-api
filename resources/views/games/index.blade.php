@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2>Education Games</h2>
        <div class="ml-auto">
            {{-- <a href="{{ route('games.create') }}"
                class="btn btn-outline-secondary">Create game</a> --}}
        </div>
    </div>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
            @include ('layouts._messages')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Desc</td>
                        <td>Purpose</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($games as $game)
                        <tr>
                            <td><a href="{{ $game->url }}"> {{ $game->name }}</a></td>
                            <td>{{ $game->desc }}</td>
                            <td>{{ $game->purpose }}</td>
                            <td><a href="{{ route('games.gamesessions', $game->slug) }}"> Session</a></td>
                        </tr>
                    @empty
                        <tr colspan="5">
                            <td>
                                <div class="alert alert-warning">
                                    <strong> Sorry</strong> There is no game available.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $games->links() }}
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
