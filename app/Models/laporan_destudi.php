<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_destudi extends Model
{
    protected $table = "laporan_destudi";

    protected $fillable = ['name', 'path', 'status', 'user_id', 'projek_id'];
}
