<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    protected $table = "projek";

    protected $fillable = ['name', 'all_status', 'user_id'];
}
