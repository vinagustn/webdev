<?php

namespace App\Models;

use App\Enum\EGender;
use App\Models\Marriage;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Birth extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'id_kawin',
        'tgl_lahir',
        'jml_anak',
        'id_anak',
        'gender_anak'
    ];

    protected $casts = [
        'id_anak' => 'array',
        'gender_anak' => 'array',
        'gender_anak' => EGender::class
    ];

    //sorting
    public $sortable = [
        'id',
        'id_kawin',
        'jml_anak',
    ];

    //relation
    public function perkawinan()
    {
        return $this->belongsTo(Marriage::class);
    }

    //searching
    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('id', 'like', '%'. $search .'%')
                         ->orWhere('id_kawin', 'like', '%'. $search .'%')
                         ->orWhere('jml_anak', 'like', '%'. $search .'%');
        });
    }
}
