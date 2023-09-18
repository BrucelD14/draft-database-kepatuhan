<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Sluggable\HasSlug;
// use Spatie\Sluggable\SlugOptions;
// use Cviebrock\EloquentSluggable\Sluggable;

class Internal_regulation extends Model
{
    use HasFactory;
    // use HasSlug;
    // use Sluggable;


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
                ->orWhere('jenis_peraturan', 'like', '%' . $search . '%');
        });
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'nomor_peraturan'
    //         ]
    //     ];
    // }

    // // customizing key route
    // public function getRouteKeyName(): string
    // {
    //     return 'slug';
    // }

}
