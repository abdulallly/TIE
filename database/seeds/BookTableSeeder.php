<?php
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ['name' => 'Kiswahili'],
            ['name' => 'English'],
            ['name' => 'History'],
        ];

        foreach($books as $book) {
           \App\Book::updateOrCreate([
               'name' => $book['name'],
            ]);
        }
    }
}
