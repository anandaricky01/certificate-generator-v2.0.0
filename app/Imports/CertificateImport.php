<?php

namespace App\Imports;

use App\Models\Certificate;
use Maatwebsite\Excel\Concerns\ToModel;

class CertificateImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Certificate([
            'name' => $row[0],
            'file_name' => '',
            'print_count' => 0
        ]);
    }
}
