<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Invoicereference;
use App\Projectmanager;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class GenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(Request $request){



        $council_id =request('council_id');
        $invoiceetails=Invoice::where('council_id','=',$council_id)->where('generated_invoice','=',0)->get();
        if(count($invoiceetails) > 0)
        {
            $userid=  DB::table('users')
                ->join('invoices','invoices.council_id','users.council_id')
                ->select('users.email')
                ->where('users.council_id','=',$council_id)
//            ->where('users.status','=',0)
                ->first();
            foreach ($userid as $idrisaa){
                $user_emaila=$idrisaa;
            }

//        approve_invoice
            $latestOrder = Invoice::orderBy('created_at','DESC')->first();
            $invoicename=Invoice::where('council_id','=',$council_id)->where('generated_invoice','=',0)->first();
            $invoiceID=$invoicename->council->code;
            $data = 'Invoice-'.$invoiceID.'-'.str_pad($latestOrder->id + 1,-0);
            $current_time = Carbon::now();
            $nowdate=$current_time->format('Y-m-d');
            $user_Id=Auth::user()->id;
            $project=Projectmanager::where('user_id','=',$user_Id)->select('id')->first();
            $invoicereference=new Invoicereference();
            $invoicereference->council_id=request('council_id');
            $invoicereference->invoicerefnumber=$data;
            $invoicereference->generated_date_by_proj=$nowdate;
            $invoicereference->projectmanager_id=$project->id;
            $invoicereference->save();


            $user_emailproj=Auth::user()->email;
            Invoice::where('council_id','=',$council_id)->where('generated_invoice','=',0)->update(['generated_invoice'=>1,'generated_date_by_proj'=>$nowdate,'invoicerefnumber'=>$data,'projectmanager_id'=>$project->id]);

//            return response()->json($invoicereference);

            return view('pages.invoice.print',compact('invoiceetails','user_emailproj','user_emaila','nowdate'))->with('i');
        }else{
            return redirect()->back()->with('failed','There are no invoince generated');
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
