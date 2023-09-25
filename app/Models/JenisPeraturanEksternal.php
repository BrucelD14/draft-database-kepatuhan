<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPeraturanEksternal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function externalRegulations()
    {
        return $this->hasMany(External_regulation::class);
    }
}
