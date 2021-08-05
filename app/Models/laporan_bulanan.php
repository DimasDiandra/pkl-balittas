<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class laporan_bulanan extends Model
{
    use HasFactory, Notifiable;

    protected $table = "laporan_bulanan";

    protected $fillable = ['name', 'path', 'status', 'user_id', 'projek_id'];
}
