@extends('layouts.layout')
@section('content')
    <section class="cabinet">
        <aside class="cabinet__menu">
            <header>
                <div class="profile">
                    <div class="avatar">
                        <img src="/images/me.jpg" alt="">
                    </div>
                    <p>Dmitry Bublik</p>
                </div>
                <ul class="cabinet__options">
                    <li><a class="cabinet__options_a a_active" href="#" id="products">Мои объявления()</a></li>
                    <li><a class="cabinet__options_a" href="#" id="add__product">Добавить объявление</a></li>
                </ul>
            </header>
        </aside>
        <div class="cabinet__advert">
            <div class="tovar__ads"></div>

            <div class="advert__status" id="tab1">
                <a href=""><h3 class="h3__title h3__active">Мои объявления ({{count($ads)}})</h3>
                </a>
                <a href=""><h3 class="h3__title">Черновики ()</h3></a>
                <a href=""><h3 class="h3__title">История ()</h3></a>
            </div>
            <div class="advert__status" id="tab2">
                <a href=""><h3 class="h3__title h3__active">Добавить объявление</h3></a>
            </div>

            <div class="advertisement__container" id="js_advert">
                @foreach($ads as $ad)
{{--                @foreach(\App\Models\Advertisement::г as $ad)--}}

                    <div class="advertisement">
                        @foreach($ad->files as $file)
                        <img class="adv_img" src="{{ $file->getUrl() }}" alt="">
                        @endforeach
                        <div class="advertisement__description">
                            <h3 class="ad__title">{{ $ad->title }}</h3>
                            <h4 class="ad__content">{{ $ad->content }}</h4>
                            <div class="location_price">
                                <h5 class="ad__location">{{ $ad->location }}</h5>
                                <h6 class="ad__price">{{ $ad->price }}₽</h6>
                            </div>
                        </div>
                        <div class="function__button">
                            <button class="redaction">Редактировать</button>
                            <button class="delete">Удалить</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="modalBackdrop">
                <div class="ads__redactor">
                    <h3>Редактировать объявление</h3>
                    <input type="file" id="image__red">
                    <input type="text" id="title__red" placeholder="Заголовок">
                    <input type="text" id="content__red" placeholder="Описание">
                    <input type="text" id="location__red" placeholder="Расположение">
                    <input type="number" id="price__red" placeholder="Цена">
                    <button class="cancel__btn">Отменить</button>
                </div>
            </div>


            <div class="form_add" id="form">
                <input type="text" id="title" placeholder="Заголовок">
                <input type="text" id="content" placeholder="Описание товара">
                <input type="text" id="location" placeholder="Место">
                <input type="number" id="price" placeholder="Цена">
                <input type="file" id="image" placeholder="Загрузите картинку">
                <button id="addAdvert">Отправить</button>
            </div>
        </div>
    </section>
@endsection
