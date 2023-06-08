<?php

namespace App\Models;

use App\Enum\EGender;
use App\Models\Health;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Breeding extends Model
{
    use HasFactory, Sortable;

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

    //sorting
    public $sortable = [
        'id',
        'gender',
        'umur',
        'tinggi',
        'panjang_bdn',
        'lingkar',
        'pj_telinga'
    ];

    // relation
    public function perkawinan()
    {
        return $this->hasMany(Marriage::class);
    }

    // relation
    public function kesehatan()
    {
        return $this->hasMany(Health::class);
    }

    //searching
    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('id', 'like', '%'. $search .'%')
                         ->orWhere('gender', 'like', '%'. $search .'%')
                         ->orWhere('umur', 'like', '%'. $search .'%')
                         ->orWhere('tinggi', 'like', '%'. $search .'%')
                         ->orWhere('panjang_bdn', 'like', '%'. $search .'%')
                         ->orWhere('lingkar', 'like', '%'. $search .'%')
                         ->orWhere('pj_telinga', 'like', '%'. $search .'%');
        });
    }
}
