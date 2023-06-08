<?php

namespace App\Models;

use App\Models\Breeding;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Health extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'id_ternak',
        'diseas_hst',
        'treat_hst'
    ];

    //sorting
    public $sortable = [
        'id_ternak',
        'diseas_hst',
        'treat_hst'
    ];

    //relation
    public function kesehatan()
    {
        return $this->belongsTo(Breeding::class);
    }
    
    //searching
    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('id_ternak', 'like', '%'. $search .'%')
                         ->orWhere('diseas_hst', 'like', '%'. $search .'%')
                         ->orWhere('treat_hst', 'like', '%'. $search .'%');
        });
    }
}
