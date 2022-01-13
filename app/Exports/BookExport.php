<?php

namespace App\Exports;

use App\Book;
use App\Book_category;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('books')
            ->select('books.*')
            ->get();
//        return Book_category::with('standard','book')
//            ->select('book_categories.name','book_categories.quantity')
//            ->get();
    }
    /**
     * @return array
     */
    public function headings():array
    {
        return [
            'ID',
            'Name',
            'Created At',
            'Updated At',
        ];
    }
}
