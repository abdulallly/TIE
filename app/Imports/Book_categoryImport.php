<?php

namespace App\Imports;

use App\Book;
use App\Book_category;
use App\Standard;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
class Book_categoryImport implements ToModel,WithHeadingRow,WithValidation{
    use Importable;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'book' => 'required|string',
            'standard' => 'required|string',
        ];
    }
    public function model(array $row){
        $book_name = Book::where("name", "like", "%".$row['book']."%")->first();
        $standard_name = Standard::where("name", "like", "%".$row['standard']."%")->first();
        $row['book_id'] = $book_name->id;
        $row['standard_id'] = $standard_name->id;
        return new Book_category([
            'name' => $row['name'],
            'quantity' => $row['quantity'],
            'book_id' => $row['book_id'],
            'standard_id' =>$row['standard_id']
        ]);
    }

}
