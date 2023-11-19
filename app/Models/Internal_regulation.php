<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internal_regulation extends Model
{
    use HasFactory;


    // protected $fillable = ['nomor_peraturan', 'tanggal_ditetapkan', 'tentang', 'status', 'dokumen', 'published_at'];
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('tentang', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('nomor_peraturan', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('jenis_peraturan', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('tentang', 'like', '%' . $search . '%')
                ->orWhere('nomor_peraturan', 'like', '%' . $search . '%')
                ->orWhere('keterangan_status', 'like', '%' . $search . '%')
                ->orWhere('tanggal_penetapan', 'like', '%' . $search . '%');
        });
        // perbaiki pencarian berdasarkan jenis peraturan
        // ->orWhere('jenis_peraturan', 'like', '%' . $search . '%');
    }

    public function jenisPeraturanInternal()
    {
        return $this->belongsTo(JenisPeraturanInternal::class);
    }
}
