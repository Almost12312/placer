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
                <a href=""><h3 class="h3__title h3__active">Мои объявления ()</h3></a>
                <a href=""><h3 class="h3__title">Черновики ()</h3></a>
                <a href=""><h3 class="h3__title">История ()</h3></a>
            </div>
            <div class="advert__status" id="tab2">
                <a href=""><h3 class="h3__title h3__active">Добавить объявление</h3></a>
            </div>

            <div class="advertisement__container" id="js_advert">
                <div class="add"></div>
                <div class="add"></div>
                <div class="add"></div>
                <div class="add"></div>
                <div class="add"></div>
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
