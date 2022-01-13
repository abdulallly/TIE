<?php

namespace App\Http\Controllers;

use App\HeadmastersFeedback;
use App\Region;
use App\StatisticalOfficersFeedback;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticalofficerfeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){



        $authuser=Auth::user()->id;
        $council_id=User::where('id',$authuser)->first();


        $feedbacks= HeadmastersFeedback::where('council_id',$council_id->council_id)->get();
//        return response()->json($feedbacks);
        return view('pages.statistical-officer-feedback.index',compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $feedbackanswer = request('answers');
        $feedbackID = request('id');
        Headmastersfeedback::where('id',$feedbackID)->update(['answer'=>$feedbackanswer]);

        return redirect()->route('statisticalofficerfeedbacks.index')->with('success','Feedback Answered successfully.');



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


    public function statisticalfeedbacks($id){

          $Feedbackanswer=Headmastersfeedback::where('id',$id)->first();

        return view('pages.statistical-officer-feedback.create',compact('Feedbackanswer'));

    }


    public function statisticalofficerfeedbackstoregion(){


        $authuser=Auth::user()->id;
        $council_id=User::where('id','=',$authuser)->first();
        $feedbacks=StatisticalOfficersFeedback::where('council_id',$council_id->council_id)
//            ->where('school_id',null)
            ->get();
//         return response()->json($feedbacks);

        return view('pages.statistical-officer-feedback.feedbacktoregion-index',compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {



        return view('pages.statistical-officer-feedback.createfeeback-to-region');
        //
    }



    public function storestatisticalofficerfeedbackstoregion(Request $request)
    {

        $request->validate([
            'feedback' => 'required',
        ]);
        $name= request('feedback');
        $statisticalfeedbacks=Auth::user()->id;

        $councilandregionid=User::where('users.id','=',$statisticalfeedbacks)->first();

        $schoolfedback=new StatisticalOfficersFeedback();
        $schoolfedback->qstn=$name;
        $schoolfedback->statisticalofficer_id=$statisticalfeedbacks;
         $schoolfedback->region_id=$councilandregionid->region_id;
         $schoolfedback->council_id=$councilandregionid->council_id;
        $schoolfedback->save();


        return redirect()->route('statisticalofficerfeedbackstoregion')->with('success','Feedback sent successfully.');


    }
}
