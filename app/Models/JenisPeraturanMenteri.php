<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPeraturanMenteri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ministerialRegulations()
    {
        return $this->hasMany(Ministerial_regulation::class);
    }
}
