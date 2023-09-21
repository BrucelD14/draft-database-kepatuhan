<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewEksternalReg extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('tentang', 'like', '%' . $search . '%')
                ->orWhere('nomor_peraturan', 'like', '%' . $search . '%')
                ->orWhere('jenis_peraturan', 'like', '%' . $search . '%');
        });
    }
}
