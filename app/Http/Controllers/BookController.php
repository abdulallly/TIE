<?php

namespace App\Http\Controllers;

use App\Book;
use App\Exports\BookExport;
use App\Imports\BookImport;
use App\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $books= Book::orderBy('id','ASC')->paginate(20);
        return view('pages.books.index',compact('books'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $standards=Standard::all();
        return view('pages.books.create',compact('standards'));
    }
    public function export(){
        return Excel::download(new BookExport(), 'books.xlsx');
    }
    public function import(){
        Excel::import(new BookImport(),request()->file('file'));
        return back();
    }
    public function getBookcategory($id){
        $book_Id=DB::table('books')
            ->select('books.id')
            ->where('id','=',$id)
            ->first();
        foreach ($book_Id as $ids) {
            $bookdetails = DB::table('book_categories')
                ->join('standards','standards.id','=','book_categories.standard_id')
                ->select('book_categories.name','book_categories.id','book_categories.quantity','standards.name as standardname')
//                ->select('book_categories.*')
                ->where('book_categories.book_id', '=', $ids)
                ->get();
        }
        return response()->json($bookdetails);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:books',
        ]);
        $name = request('name'); // Returns an array of name from the form
        foreach ($name as  $names) {
            $books = new Book();
            $books->name = $names;
            $books->save();
        }
        return redirect()->route('books.index')->with('success','Books  created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $books= Book::with('bookcategorys')->where('id','=',$id)->get();
        return view('pages.book_categories.show',compact('books'))
            ->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $books
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Book $book){
        return view('pages.books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $books =Book::find($id);
        $books->name = $request->get('name');
        $books->update();
        return redirect()->route('books.index')->with('success','Books updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        Book::find($id)->delete();
        return redirect()->route('books.index')->with('success','Books deleted successfully!!');
    }
}
