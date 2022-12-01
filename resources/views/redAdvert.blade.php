@extends('layouts.layout')

@section('content')
    <div class="redaction__adv">
{{--        {{ dd($files) }}--}}
    @isset($thisAdvContent)
            <red-container
                v-bind:this-adv='@json($thisAdvContent)'
                v-bind:images-prop='@json($files)'
            ></red-container>
        @else
            <red-container></red-container>
        @endif

{{--        <div class="redContainer">--}}

{{--            <categories></categories>--}}

{{--            <div class="redForm">--}}


{{--                @isset($thisAdvContent)--}}
{{--                    <input-prev-cont v-bind:this-adv.push='@json($thisAdvContent)'--}}

{{--                    >--}}
{{--                    </input-prev-cont>--}}

{{--                @else--}}
{{--                    <input-prev-cont></input-prev-cont>--}}
{{--                @endisset--}}


{{--            </div>--}}

{{--        </div>--}}
    </div>


@endsection
