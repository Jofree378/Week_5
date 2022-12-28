@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap__title bcg-title">Добавление игры</div>
            </div>
            <form enctype="multipart/form-data" action="{{route('games.add')}}" method="post">
                @csrf
                <div>
                    <label for="category_name">Название категории</label>
                    <select style="margin-bottom: 10px" type="text" id="category_name" name="category_name">
                        @foreach($names as $name)
                        <option>{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="cat_name">Название</label>
                    <input style="margin-bottom: 10px" type="text" id="cat_name" name="name">
                    @if ($errors->has('name'))
                        <div>{{$errors->first('name')}}</div>
                    @endif
                </div>
                <div>
                    <label for="price">Цена</label>
                    <input style="margin-bottom: 10px" type="text" id="price" name="price">
                    @if ($errors->has('price'))
                        <div>{{$errors->first('price')}}</div>
                    @endif
                </div>
                <div>
                    <label for="photo">Фото</label>
                    <input class="btn" style="margin-bottom: 10px; max-width: 220px" type="file" accept=".png, .jpg, .jpeg" id="photo" name="photo">
                </div>
                <div style="margin-bottom: 15px">
                    <label for="game_about">Описание</label>
                    <textarea type="text" id="game_about" name="game_about" style="max-width: 180px; max-height: 200px"></textarea>
                    @if ($errors->has('game_about'))
                        <div>{{$errors->first('game_about')}}</div>
                    @endif
                </div>
                <div>
                    <input class="btn" style="border: none" type="submit" value="Добавить">
                </div>
            </form>
        </div>
    </div>
@endsection
