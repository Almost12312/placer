
<header class="header">
    <div class="header__container">
        <a href="{{ route('home') }}" class="logo">
            <img src="/images/logo-10.png" alt="logo">
        </a>
        <nav class="search">
            <input type="text" placeholder="Найти">
            <img src="/images/search.svg" alt="search">
        </nav>
        <button class="user_menu">
            <div class="user_menu_container">
                <img class="burger_img" src="/images/menu_burger.svg" alt="Menu">
            </div>
            <div class="menu">
                <p><a href="{{ route('authorization') }}">Авторизация</a></p>
                <p><a href="{{ route('authorization') }}">Регистрация</a></p>
            </div>
        </button>
    </div>
</header>
