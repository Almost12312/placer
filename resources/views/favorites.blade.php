@extends('layouts.layout')

@section('content')
    <div class="favoritesRoot__container">
        <home-adv-cont
            :is-fav='@json($isFav)'
            :url='@json($url)'
        >

        </home-adv-cont>
    </div>
@endsection
