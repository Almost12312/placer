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


            @isset($thisAdv)
                    <input-prev-cont v-bind:this-adv.push='@json($thisAdv[0])'
                                     v-bind:images-props.push='@json($thisImgs)'
                    >

                    </input-prev-cont>
            @endisset


        </div>

    </div>

@endsection
