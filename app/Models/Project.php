<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Project extends Authenticatable
{
    protected $guarded = ['id'];

    protected $casts = [
        'json' => 'array', // Konversi otomatis dari string ke array
    ];
    // use HasFactory;
}
