<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Games;
use App\Mail\Order;
use App\Orders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GamesController extends Controller
{
    public function index($name)
    {
        $games = Games::query()->where('category_name', '=', $name)->get();
        $test = $games->first()['id'];
        return view ('categories.games', ['games' => $games, 'name' => $name, 'test' => $test]);
    }

    public function game($id)
    {
        $game = Games::query()->where('id', '=', $id)->first();
        return view ('categories.game', ['game' => $game]);
    }

    public function create()
    {
        $names = [];
        $categories = Categories::all();
        foreach ($categories as $category)
        {
            $names[] = $category->name;
        }
        return view ('categories.gameAdd', ['names' => $names]);
    }

    public function addGame(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:categories,name',
            'price' => 'numeric',
            'category_name' => 'required',
            'photo' => 'required|file',
            'game_about' => 'required|string'
        ]);


        $game = new Games();
        $game->name = $request->name;
        $game->price = $request->price;
        $game->category_name = $request->category_name;
        if(!empty($_FILES['photo']['tmp_name'])) {
        $game->photo = 'img/cover/' . $request->name . '.jpg';
        $fileContent = file_get_contents($_FILES['photo']['tmp_name']);
        file_put_contents($game->photo, $fileContent);
        }

        $game->about = $request->game_about;
        $game->save();
        return redirect()->route('categories');
    }

    public function deleteGame($id)
    {
        Games::where('id', $id)->delete();
        return redirect()->route('categories');
    }

    public function edit(Games $game)
    {
        $names = [];
        $categories = Categories::all();
        foreach ($categories as $category)
        {
            $names[] = $category->name;
        }

        return view ('categories.gameEdit', ['game' => $game, 'names' => $names]);
    }

    public function editSave(Request $request)
    {
        $game = Games::query()->find($request->id);

        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'numeric',
            'category_name' => 'required',
            'game_about' => 'required|string'
        ]);

        if($request->name == $game->name){
            $game->price = $request->price;
            $game->category_name = $request->category_name;
            if(!empty($_FILES['photo']['tmp_name'])) {
                unlink('img/cover/' . $game->name . '.jpg');
                $game->photo = 'img/cover/' . $request->name . '.jpg';
                $fileContent = file_get_contents($_FILES['photo']['tmp_name']);
                file_put_contents($game->photo, $fileContent);
            }
            $game->about = $request->game_about;
            $game->name = $request->name;
            $game->save();
        } else {
            $this->validate($request, [
                'name' => 'required|string|unique:categories,name',
                'price' => 'numeric',
                'category_name' => 'required',
                'game_about' => 'required|string'
            ]);
            $game->price = $request->price;
            $game->category_name = $request->category_name;
            if(!empty($_FILES['photo']['tmp_name'])) {
                unlink('img/cover/' . $game->name . '.jpg');
                $game->photo = 'img/cover/' . $request->name . '.jpg';
                $fileContent = file_get_contents($_FILES['photo']['tmp_name']);
                file_put_contents($game->photo, $fileContent);
            } else {$fileContent = file_get_contents('img/cover/' . $game->name . '.jpg');
                unlink('img/cover/' . $game->name . '.jpg');
                $game->photo = 'img/cover/' . $request->name . '.jpg';
                file_put_contents($game->photo, $fileContent);
            }
            $game->about = $request->game_about;
            $game->name = $request->name;
            $game->save();
        }

        return redirect()->route('categories');
    }

    public function buy(Games $game)
    {
        return view('categories.gameBuy', ['game' => $game]);
    }

    public function buySend(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required|alpha',
            'user_email' => 'required|email'
        ]);

        $admins = User::query()->where('is_admin', '=', 'on')->get();

        $order = new Orders();
        $order->user_name = $request->user_name;
        $order->user_email = $request->user_email;
        $order->game_id = $request->id;
        $order->save();

        Mail::to($admins)->send(new Order(['order' => $order]));

        return redirect()->route('home');
    }


}
