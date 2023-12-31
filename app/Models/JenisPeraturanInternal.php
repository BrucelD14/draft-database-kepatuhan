<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPeraturanInternal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function internalRegulations()
    {
        return $this->hasMany(Internal_regulation::class);
    }
}
