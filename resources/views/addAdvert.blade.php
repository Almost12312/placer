@extends('layouts.layout')

@section('content')
    <div class="redaction__adv">
        <div class="redContainer">

            <categories></categories>

            <div class="redForm">


                @isset($thisAdv[0])
                    <input-prev-cont v-bind:this-adv.push='@json($thisAdv[0])'
                                     v-bind:images-props.push='@json($thisImgs)'
                    >
                    </input-prev-cont>

                @else
                    <input-prev-cont v-bind:this-adv.push='@json($thisAdv)'
                                     v-bind:images-props.push='@json($thisImgs)'>
                    </input-prev-cont>
                @endisset


            </div>

        </div>
    </div>


@endsection
