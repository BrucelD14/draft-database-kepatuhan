<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ReviewEksternalReg;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CatatanReviu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ReviewEksternalReg(): BelongsTo
    {
        return $this->belongsTo(ReviewEksternalReg::class, 'reviu_peraturan_eksternal_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
