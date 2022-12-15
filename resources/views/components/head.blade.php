@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Route; @endphp
<header class="header">
    <div class="header__container">
        <a href="{{ route('home') }}" class="logo">
            <img class="logo__img__before" src="images/book.svg" alt="">
            <img class="logo__img" src="/images/new-logo.svg" alt="logo">
        </a>
        <nav class="search">
            <input type="text" placeholder="Найти">
            <img src="/images/search.svg" alt="search">
        </nav>
        @if(Auth::check())
            <button class="user_menu">
                <a href="{{ route('favorites') }}">
                    <div class="cart__container">
                        <svg version="1.1" id="favorite" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 485.3 485.3" xml:space="preserve">
                            <g>
                                <path d="M446.9,181.3c0.1-26.1-10.1-50.6-28.5-69c-18.4-18.4-42.9-28.6-68.9-28.6c-26,0-50.6,10.2-69,28.6l-21.9,21.9
                                    c-6.2,6.1-17.2,6.1-23.3,0l-22-22c-18.5-18.5-43-28.7-69.1-28.7c-25.9,0-50.4,10.2-68.8,28.5c-18.4,18.4-28.5,42.9-28.5,68.9
                                    c0.1,26.1,10.3,50.6,28.7,69l171.5,171.5l171.1-171.2C436.8,231.8,446.9,207.3,446.9,181.3z"/>
                            </g>
                        </svg>
                    </div>
                </a>
                @if(!(Route::is('cabinet')))
                    <a href="{{ route('cabinet') }}" class="user_menu_container">
                        <head-layout></head-layout>
                    </a>

                @else
                    <div class="user_menu_container">
                        <img class="burger_img" src="/images/menu_burger.svg" alt="Menu">
                    </div>
                @endif
                <div class="menu">
                    <div class="menu__option"><a id="logout">Выйти</a></div>
                </div>
            </button>
        @else
            <button class="user_menu">
                <div class="user_menu_container">
                    <img class="burger_img" src="/images/menu_burger.svg" alt="Menu">
                </div>
                <div class="menu">
                    {{--                    <p><a id="logout">Выйти</a></p>--}}
                    {{--                    <p><a href="{{ route('cabinet') }}">Личный кабинет</a></p>--}}
                    <div class="menu__option">
                        <a href="{{ route('authorization') }}">Авторизация</a>
                    </div>
                    <div><a href="{{ route('registration') }}">Регистрация</a></div>
                </div>
            </button>
        @endif

    </div>
</header>
