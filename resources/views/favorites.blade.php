@extends('layouts.layout')

@section('content')
    <div class="favoritesRoot__container">
        <advertisement-container
            :is-fav='@json($isFav)'
            :url='@json($url)'
        >

        </advertisement-container>
    </div>
@endsection
