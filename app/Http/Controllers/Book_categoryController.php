<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_category;
use App\Exports\Book_categoryExport;
use App\Imports\Book_categoryImport;
use App\Standard;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Book_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $books= Book_category::orderBy('id','ASC')->paginate(20);
        return view('pages.book_categories.index',compact('books'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $books= Book::all();
        $standards= Standard::all();
        return view('pages.book_categories.create',compact('books','standards'));
    }
    public function category(){
        $books_category= Book::all();
        $standards= Standard::all();
        return view('pages.book_categories.create',compact('books','standards'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:book_categories',
            'standard_id' => 'required',
            'book_id' => 'required'
        ]);

        $quantity = request('quantity'); // Returns an array of code from the form
        $standard_id = request('standard_id');
        $book_id = request('book_id');
        $name = request('name'); // Returns an array of name from the form

        foreach ($name as $key => $value) {
            $bookcategory = new Book_category();
            $bookcategory->name = $value;
            $bookcategory->quantity =$quantity[$key];
            $bookcategory->standard_id = $standard_id;
            $bookcategory->book_id = $book_id;
            $bookcategory->save();
        }
        return redirect()->route('book_categories.index')->with('success','Book category created successfully.');
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
     * @param Book_category $book_category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Book_category $book_category){
        $standards= Standard::all();
        $standard_selectedvalue=$book_category->standard_id;
        $books=Book::all();
        $book_selectedvalue=$book_category->book_id;
        return view('pages.book_categories.edit',
            compact('book_category','standards','standard_selectedvalue','books','book_selectedvalue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'standard_id' => 'required',
            'book_id' => 'required'
        ]);
        $quantity = request('quantity'); // Returns an array of code from the form
        $standard_id = request('standard_id');
        $book_id = request('book_id');
        $name = request('name'); // Returns an array of name from the form

        foreach ($name as $key => $value) {
            $bookcategory =Book_category::find($id);
            $bookcategory->name = $value;
            $bookcategory->quantity =$quantity[$key];
            $bookcategory->standard_id = $standard_id;
            $bookcategory->book_id = $book_id;
            $bookcategory->update();
        }
        return redirect()->route('book_categories.index')->with('success','Book category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id){
        Book_category::find($id)->delete();
        return redirect()->route('book_categories.index')->with('success','Book categories deleted successfully!!');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function book_category_imports(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();
            $formats = ['xls', 'xlsx', 'csv'];
            if (!in_array($fileExtension, $formats)) {
                return back()->with('failed','Only supports upload .xlsx .xls .csv files');
            }
        }
        Excel::import(new Book_categoryImport(),request()->file('file'));
        return back()->with('pass','Book category created successfully.');
    }
    public function category_exports(){
        return Excel::download(new Book_categoryExport(), 'book category.xlsx');
    }
}
