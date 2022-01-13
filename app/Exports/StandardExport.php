<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class StandardExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return DB::table('standards')
            ->select('standards.name')
            ->get();
    }

    /**
     * @return array
     */
    public function headings():array
    {
        return [
            'ID',
            'Name',
            'Author',
            'Created At',
            'Updated At',
        ];
    }
}
