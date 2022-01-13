<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoicereference;
use App\School;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneratestatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $user_id=Auth::user()->id;
        $council_id=  DB::table('users')
            ->select('users.council_id')
            ->where('users.id','=',$user_id)->first();
        foreach ($council_id as $councilID){
            $councilid=$councilID;
        }
        $schools=Invoicereference::where('council_id','=',$councilid)->get();
        return view('pages.invoice.statisticalofficer.councilinvoice',compact('schools'))->with('i');
    }


//    invoice list
    public  function getSchoolInvoice($id){
          $invoiceno=$id;
        $standardID= Invoice::where('invoicerefnumber', '=', $id)->select('standard_id','school_id')->first();
        $invoicesDetails= Invoice::where('invoices.invoicerefnumber','=',$id)
            ->where('invoices.generated_invoice','=',1)->get();
        $studentcount=DB::table('school_informations')->where('standard_id','=',$standardID->standard_id)
            ->where('school_id','=',$standardID->school_id)->first();
//        return response()->json($standardID->school_id);
        return view('pages.invoice.statisticalofficer.invoiceindex',compact('invoicesDetails','studentcount','invoiceno'));
    }


//Accept statistical officer
    public function councilInvoicesDetailsAccept($id){
     $authuser=Auth::user()->id;
     $stat_email=DB::table('users')
         ->join('statisticalofficers','users.id','=','statisticalofficers.user_id')
         ->select('statisticalofficers.id')
         ->where('users.id','=',$authuser)
            ->first();
        foreach ($stat_email as $emailstati){
            $emailstat=$emailstati;
        }
        $now = Carbon::now();
        $currentdate=$now->format('Y-m-d');
        Invoice::where('invoicerefnumber', '=', $id)->update(['received_invoice_stat'=>1,'accepted_date_by_stat'=>$currentdate,'statisticalofficer_id'=>$emailstat]);
        Invoicereference::where('invoicerefnumber', '=', $id)->update(['received_invoice_stat'=>1,'accepted_date_by_stat'=>$currentdate,'statisticalofficer_id'=>$emailstat]);

        return redirect()->back()->with('success','Invoice accepted successful');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
