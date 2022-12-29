@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="content-middle">
                <div class="content-head__container">

                        <div class="content-head__title-wrap__title bcg-title">Игры по категориям</div>
                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                        <a href="{{route('categories.create')}}" class="btn">Добавить категорию</a>
                        <a href="{{route('games.create')}}" class="btn">Добавить игру</a>
                    @endif



                </div>
                <div class="content-main__container">
                    <div class="products-category__list">
                        @foreach($categories as $category)
                            <div style="border: 3px solid #42d923; border-radius: 20px; margin-bottom: 15px; width: 896px">
                                <div class="products-category__list__item__title-product"><a href="{{route('games', ['name' => $category->name])}}">{{$category->name}}</a></div>
                                <div class="products-category__list__item__description" style="padding: 5px; text-align: center; display: block">{{$category->about}}</div>
                                <div style="display: flex; justify-content: space-between; margin: 5px 260px;">
                                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                        <a href="{{route('categories.edit', $category->id)}}" class="btn">Редактировать категорию</a>
                                        <a href="{{route('categories.delete', $category->id)}}" class="btn" style="background-color: #b92a2a">Удалить категорию</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
