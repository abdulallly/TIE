<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_category;
use App\Council;
use App\Invoice;
use App\Region;
use App\School;
use App\School_information;
use App\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceRecordController extends Controller
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
        return view('pages.invoicerecord.index',compact('books','regions','invoices'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }



    public function getCouncil(Request $request,$id){


        $councils=DB::table('councils')
            ->select('name','id')
            ->where('region_id','=',$id)
            ->orderBy('id','ASC')->paginate(20);
        return view('pages.invoicerecord.councilindex',compact('councils')) ->with('i', ($request->input('page', 1) - 1) * 20);

    }

    public function getSchool(Request $request,$id){
        $school_info=School::where('council_id','=',$id)->orderBy('id','ASC')->paginate(20);
        return view('pages.invoicerecord.schoolindex',compact('school_info'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public  function getInvoice($schoolID){

        $invoices=Invoice::where('invoices.school_id','=',$schoolID)
            ->groupBy('invoices.invoicerefnumber')  //equals to distinct(eliminating redundancy rows)
            ->select('invoices.*')
            ->where('generated_invoice','=',1)
            ->get();
        return view('pages.invoicerecord.invoiceindex',compact('invoices','schoolID'));
    }


    public  function getInvoiceref($id){


        $invoices= Invoice::where('id', '=', $id)->get();
        return view('pages.invoicerecord.invoicedetailsref',compact('invoices'));
    }

    public function getInvoiceDetails($schoolID,$invoiceno){


//        return response()->json($schoolID);
        $invoicesDetails= Invoice::where('invoicerefnumber', '=', $invoiceno)
            ->where('school_id','=',$schoolID)
            ->get();
        $invoicesDeta= Invoice::where('invoicerefnumber', '=', $invoiceno)->get();
        foreach ($invoicesDeta as $detail){
               $schooldetail=$detail;
        }

        $details=School_information::where('school_id', '=',$schooldetail->school_id)
             ->where('standard_id', '=',  $schooldetail->standard_id)
            ->first();

        return view('pages.invoicerecord.invoiceindexdetails',compact('invoicesDetails','details'));

    }

    public function allinvoicerecordds(Request $request){
        $category = $request->input('school');
        //now get all user and services in one go without looping using eager loading
        //In your foreach() loop, if you have 1000 users you will make 1000 queries
        $invoicesDetails = Invoice::with('school')
            ->where('generated_invoice','=',0)
           ->where('no', 'LIKE', '%' . $category . '%')
//           ->orwhere('name', 'LIKE', '%' . $category . '%')
            ->get();

//        $invoicesDetails= Invoice::all();
        return view('pages.invoicerecord.allinvoicerecords',compact('invoicesDetails'));

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
//        return response()->json($now);


        $bookcategoryID=request('bookcategory_id');
        $standardID=request('standard_id');


        $bookstandards= DB::table('book_categories')
            ->select('book_categories.standard_id')
            ->where('book_categories.id','=',$bookcategoryID)
            ->first();
        foreach ($bookstandards as $bookstandardID){
            $bookstandardIDD=$bookstandardID;
        }



        if($standardID==$bookstandardIDD){

//        return response()->json($bookstandardIDD);

        }else{
            return redirect()->back()->with('failed','Book selected is not for that standard.');
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
           $projectmangerID=DB::table('projectmanagers')
              ->select('projectmanagers.id')
               ->where('projectmanagers.user_id','=',$authuserID)
               ->first();

           $data=new Invoice();
           $data->region_id = request('region_id');
           $data->council_id =request('council_id');
           $data->school_id =request('school_id');
           $data->book_id=request('book_id');
           $data->standard_id=request('standard_id');
           $data->book_category_id=request('bookcategory_id');
           $data->created_date_by_proj=$nowdate;
           $data->projectmanager_id=$projectmangerID->id;
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
           return redirect()->route('invoices.index')->with('success','school details added  successfully.');

       }else{
           return redirect()->back()->with('failed','Our repository does not have enough books.');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $school_Id = DB::table('invoices')
            ->select('invoices.school_id')
            ->where('invoices.id', '=', $id)
            ->first();
        foreach ($school_Id as $schoolID){
            $school_ID=$schoolID;
        }
        $selectedschool_id= DB::table('schools')
            ->select('schools.id')
            ->where('schools.id','=',$school_ID)
            ->first();
        foreach ($selectedschool_id as $r){
            $selectedvalueschool_id=$r;
        }
        $schools=School::all();
        $region_Id = DB::table('invoices')
            ->select('invoices.region_id')
            ->where('invoices.id', '=', $id)
            ->first();
        foreach ($region_Id as $regionID){
            $region_ID=$regionID;
        }
        $selectedregion_id= DB::table('regions')
            ->select('regions.id')
            ->where('regions.id','=',$region_ID)
            ->first();
        foreach ($selectedregion_id as $r){
            $selectedvalueregion_id=$r;
        }
        $council_Id = DB::table('invoices')
            ->select('invoices.council_id')
            ->where('invoices.id', '=', $id)
            ->first();
        foreach ($council_Id as $councilID){
            $council_ID=$councilID;
        }
        $selectedcouncil_id= DB::table('councils')
            ->select('councils.id')
            ->where('councils.id','=',$council_ID)
            ->first();
        foreach ($selectedcouncil_id as $r){
            $selectedvaluecouncil_id=$r;
        }
        $standard_Id = DB::table('invoices')
            ->select('invoices.standard_id')
            ->where('invoices.id', '=', $id)
            ->first();
        foreach ($standard_Id as $standardID){
            $standard_ID=$standardID;
        }
        $selectedstandard_id= DB::table('standards')
            ->select('standards.id')
            ->where('standards.id','=',$standard_ID)
            ->first();
        foreach ($selectedstandard_id as $r){
            $selectedvaluestandard_id=$r;
        }


          $bookcategory_Id = DB::table('invoices')
              ->select('invoices.book_category_id')
              ->where('invoices.id', '=', $id)
              ->first();
        foreach ($bookcategory_Id as $schoolID){
            $bookcategory_ID=$schoolID;
        }
        $selectedvaluebookcategory_idd= DB::table('book_categories')
            ->select('book_categories.id')
            ->where('book_categories.id','=',$bookcategory_ID)
            ->first();
        foreach ($selectedvaluebookcategory_idd as $r){
            $selectedvaluebookcategory_id=$r;
        }

        $book_Id = DB::table('invoices')
            ->select('invoices.book_id')
            ->where('invoices.id', '=', $id)
            ->first();
        foreach ($book_Id as $schoolID){
            $bookk_ID=$schoolID;
        }
        $selectedvaluebook_idd= DB::table('books')
            ->select('books.id')
            ->where('books.id','=',$bookk_ID)
            ->first();
        foreach ($selectedvaluebook_idd as $r){
            $selectedvaluebook_id=$r;
        }



// return response()->json($selectedvaluebookcategory_id);


        $regions= Region::all();
        $councils= Council::all();
        $standards= Standard::all();
        $books= Book::all();
        $bookcategorys= Book_category::all();

        $schoolinfo = DB::table('invoices')
            ->select('invoices.*')
            ->where('invoices.id', '=', $id)
            ->get();
        foreach ($schoolinfo as $r){
            $schoolinformation=$r;
        }


        return view('pages.invoicerecord.edit',compact('schools','schoolinformation','books','bookcategorys','selectedvaluebook_id','selectedvaluebookcategory_id','selectedvalueschool_id','regions','selectedvalueregion_id','councils','selectedvaluecouncil_id','standards','selectedvaluestandard_id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'numbers' => 'required'
        ]);

        $numbers=request('numbers');
        DB::table('invoices')->where('id','=',$id)->update(['no'=>$numbers]);
        return redirect()->back()->with('success','Information upated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        return redirect()->back()->with('success','Information deleted successfully!!');
    }
}
