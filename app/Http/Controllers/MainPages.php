<?php

namespace App\Http\Controllers;

use App\Models\MainPages\Game;
use App\Models\MainPages\Genre;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller as BaseController;

class MainPages extends BaseController
{
    public function list(int $pageNumber)
    {
        $request = Request();

        $query = Game::score($request->get('mis', 0), $request->get('mas', 5));
        $column = $query->count();
        $maxPage = ceil($column / config('app.gamePageSize'));

        if ($maxPage == 0) {
            abort(404);
        } elseif ($maxPage < $pageNumber) {
            return redirect()->route('game.list', ['number' => $maxPage]);
        } elseif ($pageNumber < 1) {
            return redirect()->route('game.list', ['number' => 1]);
        }

        $games = $query->paginate(config('app.gamePageSize'), ['*'], 'page', $pageNumber);

        return view('welcome', ['games' => $games, 'pageNumber' => $pageNumber, 'maxPage' => $maxPage]);
    }

    public function show(string $name, int $id)
    {
        $game = Game::with('genre')->where('id', $id)->first();
        if ($game == null) {
            abort(404);
        }

        return view('game', ['game' => $game]);
    }
}
