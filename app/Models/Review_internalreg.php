<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_internalreg extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('tentang_peraturan', 'like', '%' . $search . '%')
                ->orWhere('kppp', 'like', '%' . $search . '%')
                ->orWhere('kpde', 'like', '%' . $search . '%');
        });
    }
}
