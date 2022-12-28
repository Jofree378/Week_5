@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap__title bcg-title">Добавление категории</div>
            </div>
            <form action="{{route('categories.add')}}" method="post">
                @csrf
                <div>
                    <label for="cat_name">Название</label>
                    <input style="margin-bottom: 10px" type="text" id="cat_name" name="name">
                    @if ($errors->has('name'))
                        <div>{{$errors->first('name')}}</div>
                    @endif
                </div>
                <div style="margin-bottom: 15px">
                    <label for="cat_about">Описание</label>
                    <textarea type="text" id="cat_about" name="about" style="max-width: 180px; max-height: 200px"></textarea>
                    @if ($errors->has('about'))
                        <div>{{$errors->first('about')}}</div>
                    @endif
                </div>
                <div>
                    <input class="btn" style="border: none" type="submit" value="Добавить">
                </div>
            </form>
        </div>
    </div>
@endsection
