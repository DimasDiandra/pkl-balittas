<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KAK extends Model
{
    protected $table = "kak";

    protected $fillable = ['name', 'file', 'path'];
}
