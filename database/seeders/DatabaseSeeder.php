<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\External_regulation;
use App\Models\Internal_regulation;
use App\Models\JenisPeraturanEksternal;
use App\Models\JenisPeraturanInternal;
use App\Models\Ministerial_regulation;
use App\Models\Review_internalreg;
use App\Models\ReviewEksternalReg;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Brucel Duta',
            'nip' => '12345',
            'password' => bcrypt('password'),
        ]);

        JenisPeraturanInternal::create([
            'nama' => 'Peraturan Direksi'
        ]);
        JenisPeraturanInternal::create([
            'nama' => 'Surat Edaran'
        ]);

        JenisPeraturanEksternal::create([
            'nama' => 'Undang-undang'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Peraturan Pemerintah'
        ]);

        Internal_regulation::factory(3)->create();
        External_regulation::factory(3)->create();
        Ministerial_regulation::factory(3)->create();
        Review_internalreg::factory(3)->create();
        ReviewEksternalReg::factory(3)->create();
    }
}
