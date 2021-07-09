<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uploadReport extends Model
{
    protected $table = "reports";

    protected $fillable = ['nama', 'file', 'keterangan'];
}
