<div>
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <td>Session</td>
            </tr>
        </thead>
        <tbody>
               @forelse ($game_sessions as $session)
                <tr>
                    <td><a href="{{ route('game_sessions.show', $session->id) }}"> {{ $session->session }}</a></td>

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
    <div>
        {{ $game_sessions->links() }}
    </div>
</div>
