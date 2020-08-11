@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2>All Prefabs</h2>
        <div class="ml-auto">
            {{-- <a href="{{ route('prefabs.create') }}" class="btn btn-outline-secondary">Create prefab</a> --}}
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
                        <td> boss_can_use </td>
                        <td> is_enabled </td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prefabs as $prefab)
                        <tr>
                            <td><a href="{{ route('prefabs.show', $prefab->id) }}"> {{ $prefab->name }}</a></td>

                            <td>{{ $prefab->boss_can_use }}</td>
                            <td>{{ $prefab->is_enabled }}</td>
                            <td>
                                {{-- <a href="{{ route('prefabs.edit', $prefab->id) }}" class="btn btn-primary">Edit</a> --}}
                            </td>
                            <td>
                                {{-- <form method="post" action="{{ route('prefabs.destroy', $prefab->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr colspan="5">
                            <td>
                                <div class="alert alert-warning">
                                    <strong> Sorry</strong> There is no prefab available.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $prefabs->links() }}
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
