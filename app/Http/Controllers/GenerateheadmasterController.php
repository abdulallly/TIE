<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\School;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GenerateheadmasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $user_id=Auth::user()->id;
        $user_email= DB::table('users')
            ->select('users.email')
            ->where('users.id','=',$user_id)->first();
        foreach ($user_email as $useremail){
            $user_emails=$useremail;
        }
        $school_id=  DB::table('users')
            ->select('users.school_id')
            ->where('users.id','=',$user_id)->first();
        foreach ($school_id as $schoolID){
            $schoolid=$schoolID;
        }
        $invoices=Invoice::where('invoices.school_id','=',$schoolid)
            ->where('invoices.generated_invoice','=',1)
            ->select('invoices.*')
            ->groupBy('invoices.invoicerefnumber')
            ->get();
        return view('pages.invoice.headmaster.invoiceindex',compact('invoices'))->with('i');
    }


//Accept head maste
    public function getSchoolInvoiceDetailsAccept($id){


        $authuser=Auth::user()->id;
        $head_id=DB::table('users')
            ->join('headmasters','users.id','=','headmasters.user_id')
            ->select('headmasters.id')
            ->where('users.id','=',$authuser)
            ->first();
        foreach ($head_id as $headidd){
            $headID=$headidd;
        }
        $now = Carbon::now();
        $currentdate=$now->format('Y-m-d');
        Invoice::where('invoicerefnumber', '=', $id)->update(['received_invoice_by_head'=>1,'accepted_date_by_head'=>$currentdate,'headmaster_id'=>$headID]);
        return redirect()->back()->with('success','Invoice accepted successful');

    }

    public function schoolsInvoicesDetailsHead($id){
        $authuser=Auth::user()->id;
        $head_id=DB::table('users')
            ->join('headmasters','users.id','=','headmasters.user_id')
            ->select('users.school_id')
            ->where('users.id','=',$authuser)
            ->first();
        foreach ($head_id as $headidd){
            $schholID=$headidd;
        }
     $invoices=   Invoice::where('invoicerefnumber', '=', $id)
         ->where('school_id','=',$schholID)
         ->where('invoices.generated_invoice','=',1)->get();


        $standardID= Invoice::where('invoicerefnumber', '=', $id)->select('standard_id','school_id')->first();
        $studentcount=DB::table('school_informations')->where('standard_id','=',$standardID->standard_id)
            ->where('school_id','=',$standardID->school_id)
            ->first();
//     return response()->json($schholID);
        return view('pages.invoice.headmaster.invoicesdetails',compact('invoices','studentcount','id'))->with('i');


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
