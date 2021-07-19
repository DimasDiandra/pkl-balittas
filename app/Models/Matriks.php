<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriks extends Model
{
    protected $table = "matriks";

    protected $fillable = ['name', 'file', 'path'];

    public function rab()
    {
        // Ini refer ke namespace model "Rooms" ya...
        // Terus, parameter ke dua, ane set "id" karena referense dari "reservations"."room_id" adalah "room"."id". Jadi, ini merupakan foreign keynya.
        return $this->hasOne('App\Models\RAB', 'id');
    }

    public function kak()
    {
        return $this->hasOne('App\Models\KAK', 'id');
    }

    public function proposal()
    {
        return $this->hasOne('App\Models\Proposal', 'id');
    }

    public function analisis()
    {
        return $this->hasOne('App\Models\Analisis', 'id');
    }
}
