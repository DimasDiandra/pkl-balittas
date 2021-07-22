<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_tengahtahun extends Model
{
    protected $table = "laporan_tengahtahun";

    protected $fillable = ['name', 'path', 'status', 'user_id', 'projek_id'];
}
