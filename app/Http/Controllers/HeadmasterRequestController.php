<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_category;
use App\Bookrequest;
use App\Council;
use App\Headmasterfeedback;
use App\HeadmastersFeedback;
use App\Region;
use App\School;
use App\School_information;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HeadmasterRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

             $authuser=Auth::user()->id;

             $user=User::where('id',$authuser)->first();

             $feedbacks=   Bookrequest::all();

//             return response()->json($user);

        return view('pages.headmaster-request.index',compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }



    public function regionindexreceived(Request $request){


        $school_info=Region::orderBy('id','ASC')->paginate(20);
        return view('pages.headmaster-request.regionindex',compact('school_info'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }



    public function councilindexreceived(Request $request,$id){

        $school_request=Council::where('region_id','=',$id)->orderBy('id','ASC')->paginate(20);
//        $school_info= School_information::orderBy('id','ASC')->paginate(20);
        return view('pages.headmaster-request.councilindex',compact('school_request'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function schooindexreceived(Request $request,$id){
        $school_info=School::where('council_id','=',$id)->orderBy('id','ASC')->paginate(20);
        return view('pages.headmaster-request.schoolindex',compact('school_info'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function bookrequestindex(Request $request,$id){

        $schoolrequest=Bookrequest::where('school_id','=',$id)->orderBy('id','ASC')->paginate(20);
        return view('pages.headmaster-request.receivedindex',compact('schoolrequest'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {


        $books= Book::all();
        $Authuser=Auth::user()->id;
        $schoolid=DB::table('users')
            ->select('school_id')->where('users.id','=',$Authuser)
            ->first();
        foreach ($schoolid as $school){
            $schooliDD=$school;
        }
        $schoolinformation=School_information::where('school_id','=',$schooliDD)->get();
        return view('pages.headmaster-request.create',compact('books','schoolinformation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $bookcategoryID=request('bookcategoryy_id');
        $standardID=request('standard');


        $bookstandards= DB::table('book_categories')
            ->select('book_categories.standard_id')
            ->where('book_categories.id','=',$bookcategoryID)
            ->first();


        foreach ($bookstandards as $bookstandardID){
            $bookstandardIDD=$bookstandardID;
        }


        if($standardID == $bookstandardIDD){


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

        $requested_quantity= request('numbers');
        if($quantityvalue >= $requested_quantity && $quantityvalue > 0  ){
            $headmasterfeedbacks=Auth::user()->id;

            $councilid=User::where('users.id','=',$headmasterfeedbacks)->first();

            $schoolfedback=new Bookrequest();
            $schoolfedback->council_id=$councilid->council_id;
            $schoolfedback->school_id=$councilid->school_id;
            $schoolfedback->region_id=$councilid->region_id;
            $schoolfedback->standard_id=request('standard');
            $schoolfedback->book_category_id= request('bookcategoryy_id');
            $schoolfedback->book_id= request('book_id');
            $schoolfedback->requested_quantity= request('numbers');
            $schoolfedback->save();
            return redirect()->route('headmasterrequests.index')->with('success','Feedback sent successfully.');

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
