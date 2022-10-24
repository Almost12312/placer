{{--@extends('layouts.layout')--}}

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix("/css/app.css") }}">
    <title>Authorization</title>
</head>
<body>
    <section class="containerAuth">
        <div class="from__container">
            <div class="social">
                <h4>Совсем немного и</h4>
                <h3>откроется новый мир</h3>
                <div class="auth__slider">SLIDER</div>
            </div>
            <div class="auth__window">
                <h3>Авторизация</h3>
                <input type="text" id="login" placeholder="Email">
                <input type="password" id="password" placeholder="Пароль">
                <button id="auth__submit">Войти</button>
            </div>
        </div>
    </section>

    <script src="{{ mix("/js/app.js") }}"></script>
</body>
</html>
