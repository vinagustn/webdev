<?php

namespace App\Models;

use App\Enum\EGender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Breeding extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'umur',
        'tinggi',
        'panjang_bdn',
        'lingkar',
        'pj_telinga'
    ];

    protected $casts = [
        'gender' => EGender::class
    ];
}
