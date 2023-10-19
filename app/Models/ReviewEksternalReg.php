<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CatatanReviu;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReviewEksternalReg extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('tentang', 'like', '%' . $search . '%')
                ->orWhere('nomor_peraturan', 'like', '%' . $search . '%');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenisPeraturanEksternal()
    {
        return $this->belongsTo(JenisPeraturanEksternal::class);
    }

    public function CatatanReviu(): HasMany
    {
        return $this->hasMany(CatatanReviu::class, 'reviu_peraturan_eksternal_id');
    }

    // public function kategoriDivisi()
    // {
    //     return $this->belongsToMany(KategoriDivisi::class, 'kategori_divisi_reviu')->withTimestamps();
    // }
}
