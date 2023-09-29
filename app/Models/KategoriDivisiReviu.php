<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KategoriDivisiReviu extends Model
{
    use HasFactory;
    protected $table = 'kategori_divisi_reviu';
    protected $guarded = ['id'];

    public function kategoriDivisi(): BelongsTo
    {
        return $this->belongsTo(KategoriDivisi::class, 'kategori_divisi_id');
    }
}
