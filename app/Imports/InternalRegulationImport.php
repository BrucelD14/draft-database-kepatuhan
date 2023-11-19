<?php

namespace App\Imports;

use App\Models\Internal_regulation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InternalRegulationImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Internal_regulation([
            'jenis_peraturan_internal_id' => $row['jenis_peraturan_internal_id'],
            'nomor_peraturan' => $row['nomor_peraturan'],
            'tanggal_penetapan' => $row['tanggal_penetapan'],
            'tentang' => $row['tentang'],
            'keterangan_status' => $row['keterangan_status'],
            'dokumen' => $row['dokumen'],
        ]);
    }
}
