<?php

namespace App\Http\Controllers;

use App\Games;
use App\Orders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        $games = Games::all();
        return view ('orders', ['orders' => $orders, 'games' => $games]);
    }

    public function changeEmail(Request $request)
    {
        $user = User::query()->find($request->id);

        $this->validate($request, [
            'admin_email' => 'required|email'
        ]);

        if($user->email == $request->admin_email) {
            $user->email = $request->admin_email;
            $user->save();
        } else {
            $this->validate($request, [
                'admin_email' => 'required|email|unique:users,email'
            ]);
            $user->email = $request->admin_email;
            $user->save();
        }

        return redirect()->route('orders');
    }
}
