<?php

namespace App\Imports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\ToModel;

class CandidateImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Candidate([
            'nik' => $row[1],
            'name' => $row[2],
            'penghasilan' => $row[3],
            'tabungan' => $row[4],
            'tanggungan' => $row[5],
            'jumlah_kepala_keluarga' => $row[6]
        ]);
    }
}
