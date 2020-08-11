@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2>Create Knowledge Components</h2>
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
                    <div class="card-header">


                    </div>
                    <div class="card-body">
                        <form action="{{ route('knowledgeComponents.store') }}" method="post">
                            @include ("knowledgeComponents._form", ['buttonText' => "Create Knowledge Component"])

                        </form>
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

