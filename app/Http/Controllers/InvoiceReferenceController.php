<?php

namespace App\Http\Controllers;

use App\Book;
use App\Invoice;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $books= Book::orderBy('id','ASC')->paginate(20);
        $regions= Region::orderBy('id','ASC')->paginate(20);
        $invoices=Invoice::orderBy('id','ASC')->paginate(20);
        return view('pages.invoice.index',compact('books','regions','invoices'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id,$hj)
    {
        //
        return response()->json($hj);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
