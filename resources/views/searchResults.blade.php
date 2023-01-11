@extends('layouts.layout')

@section('content')
    <div class="searchResultsRoot">
        <advertisement-container
            :options='@json($id)'
        ></advertisement-container>
    </div>
@endsection
