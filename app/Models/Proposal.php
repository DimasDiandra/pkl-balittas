<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = "proposal";

    protected $fillable = ['name', 'file', 'path'];
}
