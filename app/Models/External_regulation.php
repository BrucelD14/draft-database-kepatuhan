<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class External_regulation extends Model
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
        // perbaiki pencarian berdasarkan jenis peraturan
        // ->orWhere('jenis_peraturan', 'like', '%' . $search . '%');
    }

    public function jenisPeraturanEksternal()
    {
        return $this->belongsTo(JenisPeraturanEksternal::class);
    }
}
