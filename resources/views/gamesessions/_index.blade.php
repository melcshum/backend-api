<div>
    <table class="table table-striped table-responsive">
        <thead>
            <tr>

                @if ($showGame)
                    <td>Game</td>
                @endif
                <td>Session</td>
                @if ($showStudent)
                    <td>Student</td>
                @endif

            </tr>
        </thead>
        <tbody>
            @forelse ($game_sessions as $session)
                <tr>

                    @if ($showGame)
                        <td><a href="{{ route('games.show', $session->game->id) }}"> {{ $session->game->name }}</a></td>
                    @endif

                    <td><a href="{{ route('game_sessions.show', $session->id) }}"> {{ $session->session }}</a></td>

                    @if ($showStudent)
                        <td><a href="{{ route('profiles.show', $session->profile->id) }}"> {{ $session->profile->name }}</a>
                        </td>
                    @endif
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
    <div>
        {{ $game_sessions->links() }}
    </div>
</div>
