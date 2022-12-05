@extends('layouts.layout')

@section('content')
    <div class="home__slider">
        <section class="splide homeSlider" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img src='images/advertisement.jpg' alt="Sample 1">
                    </li>
                    <li class="splide__slide">
                        <img src='images/advertisement.jpg' alt="Sample 1">
                    </li>
                    <li class="splide__slide">
                        <img src='images/advertisement.jpg' alt="Sample 1">
                    </li>
                    <li class="splide__slide">
                        <img src='images/advertisement.jpg' alt="Sample 1">
                    </li>
                    <li class="splide__slide">
                        <img src='images/advertisement.jpg' alt="Sample 1">
                    </li>
                    <li class="splide__slide">
                        <img src='images/advertisement.jpg' alt="Sample 1">
                    </li>
                    <li class="splide__slide">
                        <img src='images/advertisement.jpg' alt="Sample 1">
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
                        <div class="tags__container">
                            @for($i = 0; $i < count($adv->tags); $i++)
                                <p class="tag">{{ $adv->tags[$i]->name }}</p>

                                @break($i === 2)
                            @endfor
                        </div>
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
