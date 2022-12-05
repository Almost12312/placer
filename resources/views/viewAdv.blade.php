@extends('layouts.layout')

@section('content')
    <div class="view__adv__container">
        <section class="view__adv">
            <div class="advertContainer">
                <div class="advert__images">
                    <section class="splide fade" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($thisAdv->files as $file)
                                    <li class="splide__slide">
                                        <img src='{{ $file->getUrl() }}' alt="Sample 1">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
{{--                                    <Splide :options="{ rewind: false, type: 'fade'}">--}}
{{--                                        <SplideSlide>--}}
{{--                    {{ dd($files) }}--}}
{{--                    {{ dd($thisAdv->files) }}--}}
{{--                    @foreach($thisAdv->files as $file)--}}
{{--                        <img src='{{ $file->getUrl() }}' alt="Sample 1">--}}
{{--                    @endforeach--}}
{{--                                        </SplideSlide>--}}
{{--                                        <SplideSlide>--}}
{{--                                      </SplideSlide>--}}
{{--                                    </Splide>--}}
                </div>
                <div class="advertInformation">

                    <div class="advInfoModel address">
                        <h3>Адрес</h3>
                        <h4>{{ $thisAdv->location }}</h4>
                    </div>
                    <div class="advInfoModel description">
                        <h3>Описание</h3>
                        <h4>{{ $thisAdv->content }}</h4>
                    </div>
                    <div class="advTags">
                        <h3>Теги</h3>
                        <div class="tags__container">
                            @foreach($thisAdv->tags as $tag)
                                <p class="tag">{{ $tag->name }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact__ads">
                <div class="sellerCard">
{{--                    <Profile--}}
{{--                        :userinfo='@json($user)'--}}
{{--                    ></Profile>--}}
                    <div class="sellerInfo">
                        <div class="avatar__description">
                            <div class="avatar">

                                @if(count($user->files) > 0)
                                    <img src="{{ $user->files[0]->getUrl() }}" alt="аватарка">
                                @else
                                    <div class="withoutRegPhoto__bg">
                                        <div class="withoutRegPhoto">
                                            {{ strtoupper(mb_strimwidth($user->name, 0, 1)) }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="sellerInfoDescription">
                                <p class="name">
                                    {{ $user->name }} {{ strtoupper(mb_strimwidth($user->lastname, 0, 1)) }}.
                                </p>
                                <ul class="profile__subtitle">
                                    <li><p class="profile__intro">{{ $user->city }}</p></li>
                                    <li><div class="circle"></div></li>
                                    <li><p class="profile__intro">{{ date("m d Y", strtotime($user->created_at)) }}</p></li>
                                </ul>
                                <p class="profile__intro">Объявлений: <span class="countAdvert">{{ count($user->advertisements->where('status', '=', '1')) }}</span></p>
                            </div>
                        </div>
                        <div class="contact__seller">
                            <div class="number">
                                Позвонить
                            </div>
                            <div class="ping">
                                Написать
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ads"></div>
            </div>
        </section>
    </div>
@endsection
