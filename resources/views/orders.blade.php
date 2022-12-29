@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap__title bcg-title">Заказы</div>
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                <form action="{{route('orders.changeEmail', ['id' => \Illuminate\Support\Facades\Auth::id()])}}" method="post">
                    @csrf
                    <label for="admin_email">Почта для заказов</label>
                    <input type="email" id="admin_email" name="admin_email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    <input class="btn" type="submit" value="Поменять почту">
                </form>
                @endif
            </div>
            <div class="content-main__container">
                <div class="products-category__list">
                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    <table style="border: 3px solid #31941b; margin-bottom: 15px; width: 896px; border-collapse: collapse">
                        <tr style="border: 3px solid #31941b">
                            <th style="border: 2px solid #31941b">User_name</th>
                            <th style="border: 2px solid #31941b">User_email</th>
                            <th style="border: 2px solid #31941b">Game_id</th>
                        </tr>
                    @foreach($orders as $order)

                            <tr>
                            <td style="border: 2px solid #31941b">
                                <div class="products-category__list__item__description" style="padding: 5px; text-align: center; display: block">{{$order->user_name}}</div>
                            </td>
                                <td style="border: 2px solid #31941b">
                                <div class="products-category__list__item__description" style="padding: 5px; text-align: center; display: block">{{$order->user_email}}</div>
                            </td>
                                <td style="border: 2px solid #31941b">
                                <div class="products-category__list__item__description" style="padding: 5px; text-align: center; display: block">{{$order->game_id}}</div>
                            </td>
                            </tr>

                    @endforeach
                    </table>
                    @else
                        <table style="border: 3px solid #31941b; margin-bottom: 15px; width: 896px; border-collapse: collapse">
                            <tr style="border: 3px solid #31941b">
                                <th style="border: 2px solid #31941b">Название игры</th>
                                <th style="border: 2px solid #31941b">Цена</th>
                            </tr>
                            @foreach($orders as $order)
                                @if(\Illuminate\Support\Facades\Auth::user()->email == $order->user_email)
                                <tr>
                                    @foreach($games as $game)
                                        @if($game->id == $order->game_id)
                                    <td style="border: 2px solid #31941b">
                                        <div class="products-category__list__item__description" style="padding: 5px; text-align: center; display: block">{{$game->name}}</div>
                                    </td>
                                    <td style="border: 2px solid #31941b">
                                        <div class="products-category__list__item__description" style="padding: 5px; text-align: center; display: block">{{$game->price}}</div>
                                    </td>
                                        @endif
                                    @endforeach
                                </tr>
                                @endif
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
