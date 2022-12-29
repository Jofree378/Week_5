@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Игра {{$game->name}}</div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-category__list">
                        <div style="border: 3px solid #25501c; border-radius: 10px; margin-bottom: 15px;">
                            <div class="products-category__list__item__description" style="padding: 5px;"><img src="../../../../img/cover/{{$game->name}}.jpg" width="300px" alt=""></div>
                            <div class="products-category__list__item__description" style="padding: 5px;">Цена: {{$game->price}} руб</div>
                            <div class="products-category__list__item__description" style="padding: 5px;">Категория: {{$game->category_name}}</div>
                            <div class="products-category__list__item__description" style="padding: 5px;">Описание: {{$game->about}}</div>
                        </div>
                </div>
            </div>
            <form action="/" style="display: flex; justify-content: space-between" method="get">
                <a class="btn" href="{{route('game.buy', $game->id)}}" type="button">Купить</a>
            </form>
        </div>
    </div>
@endsection
