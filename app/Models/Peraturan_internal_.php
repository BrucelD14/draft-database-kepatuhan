<?php

namespace App\Models;

class Peraturan_internal
{
    private static $internal_regulations = [
        [
            "numb_reg" => "PB-02/D2/INKA/2020",
            "date_reg" => "03 Desember 2020",
            "desc_reg" => "Hari pemungutan suara pemilihan gubernur dan wakil gubernur, bupat dan wakil bupati",
            "status" => "Berlaku",
        ],
        [
            "numb_reg" => "SE-18/D1/INKA/2020",
            "date_reg" => "30 November 2020",
            "desc_reg" => "Pengaturan hari kerja PT Industri Kereta Api (Persero) Tahun 2021",
            "status" => "Berlaku"
        ],
    ];

    public static function all()
    {
        return collect(self::$internal_regulations);
    }
}
