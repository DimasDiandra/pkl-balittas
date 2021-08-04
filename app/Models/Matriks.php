<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriks extends Model
{
    protected $table = "matriks";

    protected $fillable = ['name', 'file', 'path', 'status', 'user_id', 'projek_id'];

    public function users(){

        return $this->belongsTo(User::class, 'user_id');

    }
}
