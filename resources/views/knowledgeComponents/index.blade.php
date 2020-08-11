@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2>All Knowledge Components</h2>
        <div class="ml-auto">
            <a href="{{ route('knowledgeComponents.create') }}" class="btn btn-outline-secondary">Create Knowledge
                Components</a>
        </div>
    </div>
@stop

@section('content')

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"> --}}

                    <div class="card-body">
                        @include ('layouts._messages')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Purpose</td>
                                    <td>Level</td>
                                    <td colspan="2">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($knowledgeComponents as $kc)
                                    <tr>
                                        <td><a href="{{ route('knowledgeComponents.show', $kc->id) }}"> {{ $kc->name }}</a></td>
                                        <td>{{ $kc->purpose }}</td>
                                        <td>{{ $kc->level }}</td>
                                        <td><a href="{{ route('knowledgeComponents.edit', $kc->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('knowledgeComponents.destroy', $kc->id) }}">
                                                @csrf
                                                @method('DELETE')
                                              <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr colspan="5">
                                        <td>
                                            <div class="alert alert-warning">
                                                <strong> Sorry</strong> There is no Knowledge Components available.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $knowledgeComponents->links() }}
                        </div>


                    </div>
                    {{-- </div>
            </div>
        </div> --}}
    @stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
