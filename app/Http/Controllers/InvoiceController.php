<?php

namespace App\Http\Controllers;

use App\Book;
use App\Invoice;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $books= Book::all();
        $regions= Region::all();
        return view('pages.invoice.create',compact('regions','books'));
    }
    public function generate(){
        $regions= Region::all();
        return view('pages.invoice.generate',compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){


        $current_time = Carbon::now();
       $nowdate=$current_time->format('Y-m-d');
        $bookcategoryID=request('bookcategory_id');
        $standardID=request('standard_id');
        $bookstandards= DB::table('book_categories')
            ->select('book_categories.standard_id')
            ->where('book_categories.id','=',$bookcategoryID)->first();
        foreach ($bookstandards as $bookstandardID){
            $bookstandardIDD=$bookstandardID;
        }
        if($standardID==$bookstandardIDD){
//        return response()->json($bookstandardIDD);
        }else{
            return redirect()->back()->with('failed','Book selected is not for that standard');
        }
       $quantity= DB::table('book_categories')
            ->select('book_categories.quantity')
            ->where('book_categories.id','=',$bookcategoryID)
            ->first();
       foreach ($quantity as $quantity_item){
           $quantityvalue=$quantity_item;
       }


        $requested_quantity=  request('numbers');
       if($quantityvalue >= $requested_quantity && $quantityvalue > 0  ){
           $authuserID=Auth::user()->id;
           $authuserIDEMAIL=Auth::user()->email;
//           $projectmangerID=DB::table('projectmanagers')
//              ->select('projectmanagers.id')
//               ->where('projectmanagers.user_id','=',$authuserID)
//               ->first();



           $data=new Invoice();
           $data->region_id = request('region_id');
           $data->council_id =request('council_id');
           $data->school_id =request('school_id');
           $data->book_id=request('book_id');
           $data->standard_id=request('standard_id');
           $data->book_category_id=request('bookcategory_id');
           $data->created_date_by_proj=$nowdate;
           $data->projectmanagerinsert=$authuserIDEMAIL;
           $data->no=request('numbers');
           $latestOrder = Invoice::orderBy('created_at','DESC')->first();
           if($latestOrder  == []){
               $data->invoice_title= value('#00000001');
           }else{
               $data->invoice_title = '#'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);

           }
           $data->save();

           $requested_quantity=request('numbers');
           DB::table('book_categories')
               ->where('book_categories.id','=',$bookcategoryID)
               ->decrement('book_categories.quantity', $requested_quantity);
           return redirect()->back()->with('success','School details added  successfully.');
       }else{
           return redirect()->back()->with('failed','Our repository does not have enough books');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
