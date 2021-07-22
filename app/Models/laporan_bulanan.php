<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_bulanan extends Model
{
    protected $table = "laporan_bulanan";

    protected $fillable = ['name', 'path', 'status', 'user_id', 'projek_id'];
}
