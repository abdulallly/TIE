<?php

namespace App\Imports;

use App\Standard;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StandardImport implements ToModel, WithHeadingRow{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row){
        return new Standard([
            'name' => $row['name'],
        ]);
    }


}
