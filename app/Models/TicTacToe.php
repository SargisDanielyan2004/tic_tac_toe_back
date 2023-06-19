<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicTacToe extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'x',
        'o'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
