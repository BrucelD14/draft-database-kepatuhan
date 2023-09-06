<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\External_regulation;
use App\Models\Internal_regulation;
use App\Models\Ministerial_regulation;
use App\Models\Review_internalreg;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Internal_regulation::create([
        //     'nomor_peraturan' => 'PI-E-1',
        //     'tentang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'jenis_peraturan' => 'Peraturan Direksi',
        //     'keterangan' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'dokumen' => 'pie1.pdf'
        // ]);

        // Internal_regulation::create([
        //     'nomor_peraturan' => 'PI-E-2',
        //     'tentang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'jenis_peraturan' => 'Peraturan Direksi',
        //     'keterangan' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'dokumen' => 'pie2.pdf'
        // ]);

        // External_regulation::create([
        //     'nomor_peraturan' => 'PE-E-1',
        //     'tentang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'jenis_peraturan' => 'Undang-Undang',
        //     'keterangan' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'dokumen' => 'pee1.pdf'
        // ]);

        // External_regulation::create([
        //     'nomor_peraturan' => 'PE-E-2',
        //     'tentang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'jenis_peraturan' => 'Undang-Undang',
        //     'keterangan' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'dokumen' => 'pee2.pdf'
        // ]);

        // Ministerial_regulation::create([
        //     'nomor_peraturan' => 'PM-E-1',
        //     'tentang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'jenis_peraturan' => 'Peraturan Menteri',
        //     'keterangan' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'dokumen' => 'pme1.pdf'
        // ]);

        // Ministerial_regulation::create([
        //     'nomor_peraturan' => 'PM-E-2',
        //     'tentang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'jenis_peraturan' => 'Peraturan Menteri',
        //     'keterangan' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eos nisi vel, deserunt voluptatum quae iste neque?</p>',
        //     'dokumen' => 'pme2.pdf'
        // ]);

        Internal_regulation::factory(3)->create();
        // External_regulation::factory(5)->create();
        // Ministerial_regulation::factory(5)->create();
        // Review_internalreg::factory(3)->create();
    }
}
