<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministerial_regulation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('tentang', 'like', '%' . $search . '%')
                ->orWhere('nomor_peraturan', 'like', '%' . $search . '%')
                ->orWhere('keterangan_status', 'like', '%' . $search . '%')
                ->orWhere('tanggal_penetapan', 'like', '%' . $search . '%');
        });
    }

    public function jenisPeraturanMenteri()
    {
        return $this->belongsTo(JenisPeraturanMenteri::class);
    }
}
