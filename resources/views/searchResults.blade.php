@extends('layouts.layout')

@section('content')
    <div class="searchResultsRoot">
        <advertisement-container
            :options='@json($options)'
        ></advertisement-container>
    </div>
@endsection
