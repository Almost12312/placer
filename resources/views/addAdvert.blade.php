@extends('layouts.layout')

@section('content')
    <div class="redContainer">
        <div class="adv__preview">

        </div>

        <div class="redForm">
            <div class="ads__redactor">
                <h3>Редактировать объявление</h3>
{{--                <div class="image__now">--}}
{{--                    <h4>Картинка сейчас</h4>--}}
{{--                    <img class="img__red" src="" alt="">--}}
{{--                </div>--}}
                <div class="files__download">
                    <div class="files__download__button">
                        <input type="file" name="file" id="image" class="upload__img" placeholder="Выберите файл" multiple>
                        <label class="file__label" for="file"><img class="plus" src="/images/plus.svg" alt=""></label>
                    </div>
                    <div class="images__preview"></div>
                </div>
                <input type="text" class="red__input title__red" id="title__red" placeholder="Заголовок">
                <input type="text" class="red__input content__red" id="content__red" placeholder="Описание">
                <input type="text" class="red__input location__red" id="location__red" placeholder="Расположение">
                <input type="number" class="red__input price__red" id="price__red" placeholder="Цена">
                <textarea class="tags" name="tags" id="" placeholder="Теги"></textarea>
                <div class="function__button">
                    <button class="cancel__btn">Отменить</button>
                    <button class="cancel__btn" id="addRedaction">Редактировать</button>
                </div>
            </div>
        </div>
        <div class="categories">
            <div class="p">Выберите категорию</div>
            <div class="categories__container">
                <input type="radio" name="cars" value="cars">
                <label for="cars">Машины</label>
                <input type="radio" name="phones" value="phones">
                <label for="cars">Телефоны</label>
                <input type="radio" name="moto" value="moto">
                <label for="cars">Мотоциклы</label>
            </div>
        </div>
    </div>

@endsection
