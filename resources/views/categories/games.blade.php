@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="content-middle">
            <div class="content-head__container">

                    <div class="content-head__title-wrap__title bcg-title">Игры {{$name}}</div>

            </div>
            <div class="content-main__container">
                <div class="products-category__list">
                    @if($test)
                        @foreach($games as $game)
                            <div style="border: 3px solid #42d923; border-radius: 20px; margin-bottom: 15px; width: 896px">
                                <div class="products-category__list__item__title-product"><a href="{{route('game', $game->id)}}">{{$game->name}}</a></div>
                                <div class="products-category__list__item__description" style="padding: 5px; text-align: center; display: block">{{$game->about}}</div>
                                <div style="display: flex; justify-content: space-between; margin: 5px 260px;">
                                    <a href="{{route('games.edit', $game->id)}}" class="btn">Редактировать игру</a>
                                    <a href="{{route('games.delete', $game->id)}}" class="btn" style="background-color: #b92a2a">Удалить игру</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div>Игр в этой категории пока нет</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
