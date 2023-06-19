<?php

namespace App\Http\Controllers;

use App\Events\NewStep;
use App\Events\RestartGame;
use App\Models\Room;
use App\Models\TicTacToe;
use Illuminate\Http\Request;

class TicTacToeController extends Controller
{
    public function join($id)
    {
        $room = Room::find($id);
        if(!$room) {
            $room = Room::create(['id' => $id,'status' => 'open']);
            $room->tic_tac_toe()->create([
                'x' => true,
                'o' => false,
                'room_id' => $room->id
            ]);
            return response()->json(['player' => 'X'], 200);
        }
        $game = $room->tic_tac_toe;
        if (!$game->o) {
             $game->update(['o' => true]);
             $room->update(['status' => 'close']);
        }else {
            throw new \Exception('you cannot play');
        }
        return response()->json(['player' => 'O'], 200);

    }

    public function makeStep($id, Request $request)
    {
        NewStep::dispatch($id, $request->player, $request->step, $request->message, $request->combination);
        return response()->json(['message' => 'success']);
    }

    public function restartGame($id, Request $request)
    {
        RestartGame::dispatch($id, $request->reset, $request->resetForSecondPlayer, $request->player);
        return response()->json(['message' => 'success']);
    }
}
