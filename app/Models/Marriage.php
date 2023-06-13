<?php

namespace App\Models;

use App\Enum\EStatus;
use App\Models\Birth;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marriage extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'tgl_kawin',
        'id_jantan',
        'id_betina',
        'status'
    ];

    public $sortable = [
        'id',
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

    public function kelahiran()
    {
        return $this->hasMany(Birth::class);
    }

    //searching
    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('id', 'like', '%'. $search .'%')
                         ->orWhere('tgl_kawin', 'like', '%'. $search .'%')
                         ->orWhere('id_jantan', 'like', '%'. $search .'%')
                         ->orWhere('id_betina', 'like', '%'. $search .'%')
                         ->orWhere('status', 'like', '%'. $search .'%');
        });
    }
}
