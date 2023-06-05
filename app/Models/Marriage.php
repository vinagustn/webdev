<?php

namespace App\Models;

use App\Enum\EStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marriage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_kawin',
        'id_jantan',
        'id_betina',
        'status'
    ];

    protected $casts = [
        'status' => EStatus::class
    ];

    // relation
    public function breed()
    {
        return $this->belongsTo(Breeding::class);
    }
}
