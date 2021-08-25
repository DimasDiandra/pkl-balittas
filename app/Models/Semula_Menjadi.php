<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semula_Menjadi extends Model
{
    protected $table = "semula_menjadi";

    protected $fillable = ['name', 'file', 'path', 'status', 'user_id', 'projek_id'];
}
