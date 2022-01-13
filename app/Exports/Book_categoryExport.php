<?php

namespace App\Exports;

use App\Book_category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
class Book_categoryExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents{
    public function headings(): array
    {
        return
            ['name', 'book','Standard', 'Quantity'];
    }
    /**
    * @return Collection
    */
    public function collection(){
        $book_category = DB::table('book_categories')
            ->join('books', 'books.id', '=', 'book_categories.book_id')
            ->join('standards', 'standards.id', '=', 'book_categories.standard_id')
            ->select('books.name as book','book_categories.name as book category', 'book_categories.quantity', 'standards.name as standard')
            ->get();
        return $book_category;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
