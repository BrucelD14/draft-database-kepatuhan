<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\External_regulation;
use App\Models\Internal_regulation;
use App\Models\JenisPeraturanEksternal;
use App\Models\JenisPeraturanInternal;
use App\Models\JenisPeraturanMenteri;
use App\Models\KategoriDivisi;
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
            'role' => 'editor',
            'jabatan' => 'Senior Manajer MRH'
        ]);
        User::create([
            'name' => 'Violita Zahrah',
            'nip' => '67890',
            'password' => bcrypt('password'),
            'role' => 'reviewer',
            'jabatan' => 'Manajer KTKP'
        ]);
        User::create([
            'name' => 'Fajar Chan',
            'nip' => '54321',
            'password' => bcrypt('password'),
            'jabatan' => 'Staff KTKP'
        ]);
        User::create([
            'name' => 'Raga Tri',
            'nip' => '11111',
            'password' => bcrypt('password'),
            'jabatan' => 'Staff MR'
        ]);
        User::create([
            'name' => 'Ramadloni',
            'nip' => '22222',
            'password' => bcrypt('password'),
            'jabatan' => 'Staff Risbang'
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
        JenisPeraturanMenteri::create([
            'nama' => 'Peraturan Menteri'
        ]);
        JenisPeraturanMenteri::create([
            'nama' => 'Keputusan Menteri'
        ]);

        KategoriDivisi::create([
            'nama' => 'Manajemen Risiko dan Hukum'
        ]);
        KategoriDivisi::create([
            'nama' => 'Riset dan Pengembangan'
        ]);

        Internal_regulation::factory(20)->create();
        External_regulation::factory(20)->create();
        Ministerial_regulation::factory(30)->create();
        Review_internalreg::factory(30)->create();
        ReviewEksternalReg::factory(10)->create();
    }
}
