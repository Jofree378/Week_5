<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Магазин игр') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-size: cover">
<div class="main-wrapper">
    @guest
        <div class="authorization-block" style="position: absolute; right: 795px; top: 210px; ">

            <a class="authorization-block__link" style="font-size: 18px"
               href="{{ route('login') }}">{{ __('Login') }}</a>

            @if (Route::has('register'))

                <a class="authorization-block__link" style="font-size: 18px"
                   href="{{ route('register') }}">{{ __('Register') }}</a>

            @endif
        </div>
        <main style="margin: 240px 450px">
            @yield('auth')
        </main>
    @else
    <header class="main-header">
        <div class="logotype-container">
            <a href="{{ url('/') }}" class="nav-list__item__link"
               style="font-size: 30px; font-family: PT_Sans, sans-serif">{{ config('app.name', 'Магазин игр') }}</a>
        </div>

        <nav class="main-navigation">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Мои заказы</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
            </ul>
        </nav>

        <div class="header-contact">
            <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a>
            </div>
        </div>
        <div class="header-container">
            <div class="payment-container">
                <div class="payment-basket__status">
                    <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i
                                class="fa fa-shopping-basket"></i></a></div>
                    <div class="payment-basket__status__basket"><span
                            class="payment-basket__status__basket-value">0</span><span
                            class="payment-basket__status__basket-value-descr">товаров</span></div>
                </div>
            </div>
        </div>
        <!-- Authentication Links -->

            <div class="authorization-block">
                <a id="navbarDropdown" class="authorization-block__link" style="font-size: 18px; font-weight: bold"
                   href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <a class="authorization-block__link" style="font-size: 18px" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Выход') }}
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </header>
    <div class="middle">
        <div class="sidebar">
            <div class="sidebar-item">
                <div class="sidebar-item">
                    <div class="sidebar-item__title"><a href="{{ route('categories') }}" class="sidebar-category__item__link">Категории</a></div>
                </div>
                <div class="sidebar-item__title">Последние новости</div>
                <div class="sidebar-item__content">
                    <div class="sidebar-news">
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="../../../img/cover/game-2.jpg" alt="image-new" class="sidebar-new__item__preview-new__image">
                            </div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="../../../img/cover/game-1.jpg" alt="image-new" class="sidebar-new__item__preview-new__image">
                            </div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="../../../img/cover/game-4.jpg" alt="image-new" class="sidebar-new__item__preview-new__image">
                            </div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin: 0 auto">@yield('content')</div>
    </div>
        <footer class="footer">
            <div class="footer__footer-content">
                <div class="random-product-container">
                    <div class="random-product-container__head">Случайный товар</div>
                    <div class="random-product-container__content">
                        <div class="item-product">
                            <div class="item-product__title-product"><a href="#" class="item-product__title-product__link">The Witcher 3: Wild Hunt</a></div>
                            <div class="item-product__thumbnail"><a href="#" class="item-product__thumbnail__link"><img src="../../../img/cover/game-1.jpg" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
                            <div class="item-product__description">
                                <div class="item-product__description__products-price"><span class="products-price">400 руб</span></div>
                                <div class="item-product__description__btn-block"><a href="#" class="btn btn-blue">Купить</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__footer-content__main-content">
                    <p>
                        Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
                        онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
                        У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
                        и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
                        коды продления и многое друго. Также здесь всегда можно узнать последние новости
                        из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
                        актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
                        что немаловажно, выгодно!
                    </p>
                </div>
            </div>
            <div class="footer__social-block">
                <ul class="social-block__list bcg-social">
                    <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
                    <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </footer>
    @endguest
</div>
</body>
</html>
