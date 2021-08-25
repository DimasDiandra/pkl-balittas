<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisi_RAB extends Model
{
    protected $table = "revisi_rab";

    protected $fillable = ['name', 'file', 'path', 'status', 'user_id', 'projek_id'];
}
