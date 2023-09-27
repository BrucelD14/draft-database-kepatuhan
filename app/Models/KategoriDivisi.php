<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDivisi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reviewEksternalRegs()
    {
        return $this->belongsToMany(ReviewEksternalReg::class, 'kategori_divisi_reviu')->withTimestamps();
    }
}
