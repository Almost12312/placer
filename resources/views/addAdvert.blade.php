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

                    <input-prev-cont>

                    </input-prev-cont>
{{--                    <inputs-advert></inputs-advert>--}}
{{--                    --}}{{--                <div class="image__now">--}}
{{--                    --}}{{--                    <h4>Картинка сейчас</h4>--}}
{{--                    --}}{{--                    <img class="img__red" src="" alt="">--}}
{{--                    --}}{{--                </div>--}}

                    <div class="function__button">
                        <button class="cancel__btn">Отменить</button>
                        <button class="cancel__btn" id="addRedaction">Редактировать</button>
                    </div>

{{--                    <preview></preview>--}}


        </div>
    </div>

@endsection
