<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_triwulan extends Model
{
    protected $table = "laporan_triwulan";

    protected $fillable = ['name', 'path', 'status', 'user_id', 'projek_id'];
}
