<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    protected $table = "analisis";

    protected $fillable = ['name', 'file', 'path'];
}
