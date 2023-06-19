<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\TicTacToe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicTacToeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = TicTacToe::factory(10)->create();
        foreach ($games as $game) {
            if ($game->x) {
                $game->update(['o' => fake()->randomElement([0, 1])]);
            }
            if ($game->x && $game->o) {
                $room = Room::find($game->room_id);
                $room->update(['status' =>'close']);
            }
        }
    }
}
