<header class="header">
    <div class="header__container">
        <div class="logo">
            <img src="images/redus.png" alt="logo">
        </div>
        <nav class="search">
            <input type="text">
            <input type="submit">

        </nav>
        <button class="user_menu">
            <div class="user_menu_container">
                <img class="burger_img" src="images/menu_burger.svg" alt="Menu">
                <img class="user_img" src="images/user.svg" alt="Profile">
            </div>
            <div class="menu">
                <p><a href="{{ route('authorization') }}">Авторизация</a></p>
                <p><a href="{{ route('authorization') }}">Регистрация</a></p>
            </div>
        </button>
    </div>
</header>
