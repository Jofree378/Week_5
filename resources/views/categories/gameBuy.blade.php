@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap__title bcg-title">Заявка на покупку</div>
            </div>
            <form action="{{route('game.buySend', ['id' => $game->id])}}" method="post">
                @csrf
                <div>
                    <label for="user_name">Ваше имя</label>
                    <input style="margin-bottom: 10px" type="text" id="user_name" name="user_name">
                    @if ($errors->has('user_name'))
                        <div>{{$errors->first('user_name')}}</div>
                    @endif
                </div>
                <div style="margin-bottom: 15px">
                    <label for="user_email">E-mail</label>
                    <input type="text" id="user_email" name="user_email" style="margin-bottom: 10px" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    @if ($errors->has('user_email'))
                        <div>{{$errors->first('user_email')}}</div>
                    @endif
                </div>
                <div>
                    <input class="btn" style="border: none" type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </div>
@endsection
