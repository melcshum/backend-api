@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2>Player Profiles</h2>
        <div class="ml-auto">
            {{-- <a href="{{ route('profiles.create') }}"
                class="btn btn-outline-secondary">Create profile</a> --}}
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
                        <td> User ID</td>
                        <td> User Name</td>
                        <td> Player Name</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($profiles as $profile)
                        <tr>

                            <td>{{ $profile->user->id }}</td>
                            <td>{{ $profile->user->name }}</td>
                            <td><a href="{{ $profile->url }}"> {{ $profile->name }}</a></td>

                        </tr>
                    @empty
                        <tr colspan="5">
                            <td>
                                <div class="alert alert-warning">
                                    <strong> Sorry</strong> There is no profile available.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $profiles->links() }}
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
