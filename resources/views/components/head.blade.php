@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Route; @endphp
<header class="header">
    <div class="header__container">
        <a href="{{ route('home') }}" class="logo">
            <img class="logo__img__before" src="images/book.svg" alt="">
            <img class="logo__img" src="/images/new-logo.svg" alt="logo">
        </a>
        <nav class="search__container">
            <div class="categories__btn">
{{--                <div class="svg__wrapper">--}}
{{--                    <svg fill="#000000" height="800px" width="800px" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
{{--                         viewBox="0 0 491 491" xml:space="preserve">--}}
{{--                        <path d="M489.658,189.942l-45.205-85.169c-1.534-2.889-4.147-4.877-7.108-5.693c-0.02-0.005-0.032-0.012-0.053-0.018L248.97,48.229--}}
{{--                            c-1.958-0.527-4.021-0.53-5.98-0.004L53.721,99.058c-0.021,0.006-0.035,0.013-0.057,0.019c-2.966,0.814-5.583,2.804-7.118,5.696--}}
{{--                            L1.342,189.942c-1.473,2.776-1.746,6.034-0.756,9.016c0.99,2.982,3.158,5.43,5.999,6.772l39.331,18.592v116.344--}}
{{--                            c0,4.414,2.526,8.439,6.502,10.356l188.557,91.002c1.584,0.765,3.293,1.143,4.997,1.143c1.691,0,3.372-0.389,4.927-1.127--}}
{{--                            c0.025-0.006,0.049-0.005,0.072-0.017l188.557-91.002c3.976-1.918,6.502-5.942,6.502-10.356V224.332c0-0.15-0.017-0.297-0.022-0.445--}}
{{--                            l38.408-18.156c2.841-1.343,5.009-3.79,5.999-6.772C491.404,195.975,491.131,192.719,489.658,189.942z M245.965,71.241--}}
{{--                            l150.587,40.647L245.5,167.87L94.52,111.916L245.965,71.241z M62.144,124.445l167.892,62.223l-36.977,81.771L27.306,190.085--}}
{{--                            L62.144,124.445z M68.916,333.447v-98.252l124.887,59.035c1.552,0.734,3.232,1.104,4.915,1.104c1.341,0,2.685-0.234,3.968-0.706--}}
{{--                            c2.895-1.064,5.24-3.246,6.511-6.056l25.276-55.896v180.673L68.916,333.447z M423.029,333.447l-165.557,79.902V234.767--}}
{{--                            l24.331,53.805c1.271,2.81,3.616,4.991,6.511,6.056c1.283,0.472,2.627,0.706,3.968,0.706c1.684,0,3.363-0.369,4.915-1.104--}}
{{--                            l125.832-59.482V333.447z M297.941,268.438l-36.978-81.771l167.892-62.223l34.839,65.64L297.941,268.438z"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
                Категории

                <div class="categories__container">
                    <label class="home__category__container">
                        <a href="{{ route('search', 1) }}">
                            <span class="linkText">Машины</span>
                        </a>
                    </label>
                    <label class="home__category__container">
                        <a href="{{ route('search', 2) }}">
                            <span class="linkText">Телефоны</span>
                        </a>
                    </label>
                    <label class="home__category__container">
                        <a href="{{ route('search', 3) }}">
                            <span class="linkText">Мотоциклы</span>
                        </a>
                    </label>
                </div>
            </div>
            <search></search>
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
