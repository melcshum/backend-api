@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2> Knowledge Components</h2>
        <div class="ml-auto align-items-right">
            <a href="{{ route('knowledgeComponents.index') }}" class="btn btn-outline-secondary">Back to all
                Knowledge Components</a>
        </div>
    </div>


@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-2"> <strong>Name</strong> {{ $knowledgeComponent->name }}</div>
                        <div class="mt-2"><strong> Purpose</strong> {{ $knowledgeComponent->purpose }}</div>
                        <div class="mt-2"><strong> Level </strong>{{ $knowledgeComponent->level }} </div>

                    </div>
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
