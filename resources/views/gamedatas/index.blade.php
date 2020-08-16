@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="d-flex align-items-center">
        <h2>All Scenarios</h2>
        <div class="ml-auto">
            {{-- <a href="{{ route('scenarios.create') }}" class="btn btn-outline-secondary">Create scenario</a> --}}
        </div>
    </div>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
           <example-component></example-component>
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
