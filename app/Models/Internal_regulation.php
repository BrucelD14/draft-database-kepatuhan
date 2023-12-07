<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internal_regulation extends Model
{
    use HasFactory;


    // protected $fillable = ['nomor_peraturan', 'tanggal_ditetapkan', 'tentang', 'status', 'dokumen', 'published_at'];
    protected $guarded = ['id'];

    public function jenisPeraturanInternal()
    {
        return $this->belongsTo(JenisPeraturanInternal::class);
    }

    public function kategoriDivisi()
    {
        return $this->belongsTo(KategoriDivisi::class);
    }
}
