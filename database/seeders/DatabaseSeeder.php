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

        // USER
        User::create([
            'nip' => 'approval_JDIH_INKA',
            'name' => 'Approval JDIH INKA',
            'job_id' => null,
            'password' => bcrypt('inkaindonesia02'),
        ]);
        User::create([
            'nip' => 'editor_JDIH_INKA',
            'name' => 'Editor JDIH INKA',
            'job_id' => null,
            'password' => bcrypt('inkaindonesia01'),
        ]);
        // User::create([
        //     'nip' => '12345',
        //     'name' => 'Brucel Duta',
        //     'job_id' => '2',
        //     'password' => bcrypt('password'),
        // ]);

        // JENIS PERATURAN INTERNAL
        JenisPeraturanInternal::create([
            'nama' => 'Peraturan Direksi'
        ]);
        JenisPeraturanInternal::create([
            'nama' => 'Surat Edaran'
        ]);

        // JENIS PERATURAN EKSTERNAL
        JenisPeraturanEksternal::create([
            'nama' => 'Undang-Undang'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Peraturan Pemerintah'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Peraturan Pemerintah Pengganti Undang-Undang'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Peraturan Presiden'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Instruksi Presiden'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Keputusan Presiden'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Surat Edaran Sekretaris Kementerian'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Peraturan Mahkamah Agung'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Putusan Mahkamah Konstitusi'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Peraturan Menteri'
        ]);
        JenisPeraturanEksternal::create([
            'nama' => 'Keputusan Menteri'
        ]);

        // JENIS PERATURAN MENTERI
        JenisPeraturanMenteri::create([
            'nama' => 'Peraturan Menteri BUMN'
        ]);
        JenisPeraturanMenteri::create([
            'nama' => 'Surat Edaran Menteri BUMN'
        ]);
        JenisPeraturanMenteri::create([
            'nama' => 'Keputusan Menteri BUMN'
        ]);

        // Internal_regulation::factory(20)->create();
        // External_regulation::factory(20)->create();
        // Ministerial_regulation::factory(30)->create();
        // Review_internalreg::factory(30)->create();
        // ReviewEksternalReg::factory(10)->create();
    }
}
