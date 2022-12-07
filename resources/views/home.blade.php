@extends('layouts.layout')

@section('content')
    <div class="home__slider">
        <section class="splide homeSlider" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
{{--                        <img src='images/milo2.png' alt="Sample 1">--}}
                        <img src='images/vectorizate.svg' alt="Sample 1">
                    </li>
                    <li class="splide__slide">
                        <img src='images/infograf3-1.svg' alt="Sample 1">
                    </li>
                    <li class="splide__slide">
                        <img src='images/infograf4.svg' alt="">
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="intro">
        <h2>Добропожаловать на</h2>
        <h1>Plater</h1>
    </div>

    <div class="posts">
        <h3>Объявления</h3>
        <div class="advertisement__container" id="homeAdvCont">
            @foreach($advs as $adv)
{{--                {{ dd($adv->images) }}--}}
                <div class="advertisement" data-id="{{ $adv->id }}">
                    <div class="img__open">
                        <div class="openAdv"></div>
{{--                        {{ dd($adv->images) }}--}}
                        @if(count($adv->files) > 0)
                            <img class="adv_img" src="{{ $adv->files[0]->getUrl() }}" alt="">
                        @else
                            <div class="noPhotoCont">
                                <img class="noPhoto" src="/images/noPhoto.svg" alt="">
                            </div>
                        @endif
                        <div class="favorites__container">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 485.3 485.3" xml:space="preserve" stroke="red" stroke-width="30" fill="none">
                                <g>
                                    <path d="M446.9,181.3c0.1-26.1-10.1-50.6-28.5-69c-18.4-18.4-42.9-28.6-68.9-28.6c-26,0-50.6,10.2-69,28.6l-21.9,21.9
                                        c-6.2,6.1-17.2,6.1-23.3,0l-22-22c-18.5-18.5-43-28.7-69.1-28.7c-25.9,0-50.4,10.2-68.8,28.5c-18.4,18.4-28.5,42.9-28.5,68.9
                                        c0.1,26.1,10.3,50.6,28.7,69l171.5,171.5l171.1-171.2C436.8,231.8,446.9,207.3,446.9,181.3z"/>
                                </g>
                            </svg>
                        </div>
{{--                        <div class="tags__container">--}}
                            <div class="tags__list">
                                @for($i = 0; $i < count($adv->tags); $i++)
                                    <p class="tag">{{ $adv->tags[$i]->name }}</p>

                                    @break($i === 1)
                                @endfor
                            </div>
{{--                        </div>--}}
                    </div>
                    <div class="advertisement__description">
                        <h3 class="ad__title">{{ $adv->title }}</h3>
                        <h4 class="ad__content">{{ $adv->content }}</h4>
                        <div class="location_price">
                            <h5 class="ad__location">{{ $adv->location }}</h5>
                            <h6 class="ad__price">
                                @if($adv->price === 0 || $adv->price === null)
                                    <span class="no__price">Бесплатно</span>
                                @else
                                    <span class="num__price">{{ $adv->price }}</span>
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
