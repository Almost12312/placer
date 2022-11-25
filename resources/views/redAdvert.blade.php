@extends('layouts.layout')

@section('content')
    <div class="redaction__adv">
        <div class="redContainer">

            <categories></categories>

            <div class="redForm">


                @isset($thisAdvContent)
                    <input-prev-cont v-bind:this-adv.push='@json($thisAdvContent)'
                    >
                    </input-prev-cont>

                @else
                    <input-prev-cont></input-prev-cont>
                @endisset


            </div>

        </div>
    </div>


@endsection
