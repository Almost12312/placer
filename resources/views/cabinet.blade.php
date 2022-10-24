@extends('layouts.layout')
@section('content')
    <section class="cabinet">
        <aside class="cabinet__menu">
            <header>
                <div class="profile">
                    <div class="avatar">
                        <img src="/images/me.jpg" alt="">
                    </div>
                    <p>Dmitry Bibk</p>
                </div>
                <ul class="cabinet__options">
                    <li><a class="cabinet__options_a a_active" href="#">Мои объявления()</a></li>
                    <li><a class="cabinet__options_a" href="#">Добавить объявление</a></li>
                </ul>
            </header>
        </aside>
        <div class="cabinet__advert">
            <div class="tovar__ads"></div>

            <div class="advert__status">
                <a href=""><h3 class="h3__active">Мои объявления ()</h3></a>
                <a href=""><h3>Черновики ()</h3></a>
                <a href=""><h3>История ()</h3></a>
            </div>
            <div class="advertisement__container">
                <div class="add"></div>
                <div class="add"></div>
                <div class="add"></div>
            </div>
        </div>
    </section>
@endsection
