@extends('layouts.layout')

@section('content')
    <div class="redContainer">
        <div class="categories">
            <header class="categories__title">Выберите категорию</header>
            <div class="categories__container">
                <div class="category__container">
                    <img src="/images/car.svg" alt="moto">
                    <input type="radio" name="cars" value="cars" hidden>
                    <label for="cars">Машины</label>
                </div>
                <div class="category__container">
                    <img src="/images/phone.svg" alt="moto">
                    <input type="radio" name="phones" value="phones" hidden>
                    <label for="cars">Телефоны</label>
                </div>
                <div class="category__container">
                    <img src="/images/bike.svg" alt="moto">
                    <input type="radio" name="moto" value="moto" hidden>
                    <label for="cars">Мотоциклы</label>
                </div>
                <div class="category__container">
                    <img src="/images/appliances.svg" alt="moto">
                    <input type="radio" name="appliances" value="appliances" hidden>
                    <label for="appliances">Бытовая техника</label>
                </div>
            </div>
        </div>


        <div class="redForm">
            <div class="ads__redactor">
                <h3>Редактировать объявление</h3>
{{--                <div class="image__now">--}}
{{--                    <h4>Картинка сейчас</h4>--}}
{{--                    <img class="img__red" src="" alt="">--}}
{{--                </div>--}}
                <input type="text" class="red__input title__red" id="title__red" placeholder="Заголовок">
                <input type="text" class="red__input content__red" id="content__red" placeholder="Описание">
                <input type="text" class="red__input location__red" id="location__red" placeholder="Расположение">
                <input type="number" class="red__input price__red" id="price__red" placeholder="Цена">
                <textarea class="tags" name="tags" id="" placeholder="Теги"></textarea>
{{--                <div class="function__button">--}}
{{--                    <button class="cancel__btn">Отменить</button>--}}
{{--                    <button class="cancel__btn" id="addRedaction">Редактировать</button>--}}
{{--                </div>--}}
            </div>

        </div>
        <div class="adv__preview__container">

            <div class="adv__preview">
                <div class="advertisement">
                    <div class="files__download__container">
                        <preview></preview>
                    </div>
                    <div class="advertisement__description">
                        <h3 class="ad__title">Мое объявление</h3>
                        <h4 class="ad__content">Самое первое</h4>
                        <div class="location_price">
                            <h5 class="ad__location">г.Белгород</h5>
                            <h6 class="ad__price">
                                <p class="num__price">321</p>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
