<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internal_regulation extends Model
{
    use HasFactory;

    // protected $fillable = ['nomor_peraturan', 'tanggal_ditetapkan', 'tentang', 'status', 'dokumen', 'published_at'];
    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('tentang', 'like', '%' . request('search') . '%')
                ->orWhere('nomor_peraturan', 'like', '%' . request('search') . '%')
                ->orWhere('jenis_peraturan', 'like', '%' . request('search') . '%');
        }
    }
}
