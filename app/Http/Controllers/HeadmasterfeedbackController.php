<?php

namespace App\Http\Controllers;

use App\Headmasterfeedback;
use App\HeadmastersFeedback;
use App\Region;
use App\School;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeadmasterfeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


             $authuser=Auth::user()->id;
              $school_id=User::where('id',$authuser)->first();
             $feedbacks=   HeadmastersFeedback::where('school_id',$school_id->school_id)->get();


        return view('pages.headmaster-feedback.index',compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $regions= Region::all();
        return view('pages.headmaster-feedback.create',compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $name= request('name');
        $sentto= request('sentto');


//        return response()->json($request);

//        $male = request('male');

        $headmasterfeedbacks=Auth::user()->id;

        $councilid=User::where('users.id',$headmasterfeedbacks)->first();

//        return response()->json($councilid);

        $schoolfedback=new HeadmastersFeedback();
        $schoolfedback->qstn=$name;
        $schoolfedback->headmaster_id=$headmasterfeedbacks;
        if($sentto=="projectmanager"){
            $schoolfedback->region_id=$councilid->region_id;

        }
        if($sentto=="councilofficer"){
            $schoolfedback->region_id=$councilid->region_id;
            $schoolfedback->council_id=$councilid->council_id;
        }
        $schoolfedback->school_id=$councilid->school_id;



//        $schoolfedback->statisticalofficer_id=$standard_id;
//        $schoolfedback->projectmanager_id=$school_id;



        $schoolfedback->save();


        return redirect()->route('headmasterfeedbacks.index')->with('success','Feedback sent successfully.');


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
