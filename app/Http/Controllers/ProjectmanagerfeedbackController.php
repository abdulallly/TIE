<?php

namespace App\Http\Controllers;

use App\HeadmastersFeedback;
use App\ProjectManagersFeedback;
use App\Region;
use App\StatisticalOfficersFeedback;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectmanagerfeedbackController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $feedbacks=ProjectManagersFeedback::all();
        return view('pages.project-manager-feedback.index',compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function councilfeedbacks(){
        $feedbacks= StatisticalOfficersFeedback::all();
        return view('pages.project-manager-feedback.council-ndex',compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }


    public function schoolfeedbacks(){
        $feedbacks= HeadmastersFeedback::where('council_id',null)->get();

//        return response()->json($feedbacks);
        return view('pages.project-manager-feedback.school-index',compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        $regions= Region::all();
        return view('pages.project-manager-feedback.create',compact('regions'));
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
                'region_id' => 'required',
                'council_id' => 'required',
                'feedback' => 'required',
            ]);
            $region_id= request('region_id');
            $council_id= request('council_id');
            $notification= request('feedback');

            $headmasterfeedbacks=Auth::user()->id;

            $councilid=User::where('users.id',$headmasterfeedbacks)->first();

//        return response()->json($councilid);

            $councilnotification=new ProjectManagersFeedback();
            $councilnotification->notification=$notification;
            $councilnotification->region_id=$region_id;
            $councilnotification->council_id=$council_id;
            $councilnotification->save();


            return redirect()->route('projectmanagerfeedbacks.index')->with('success','Notification sent successful');


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

        $Feedbackanswer=StatisticalOfficersFeedback::where('id',$id)->first();
        return view('pages.project-manager-feedback.createcouncil',compact('Feedbackanswer'));


    }


    public function schooledit($id)
    {

        $Feedbackanswer=HeadmastersFeedback::where('id',$id)->first();
        return view('pages.project-manager-feedback.createschool',compact('Feedbackanswer'));


    }

    public function statisticalofficerfeedbacksformmanager(Request $request){

        $feedbackanswer = request('answers');
        $feedbackID = request('id');

//        return \response()->json($request);
        StatisticalOfficersFeedback::where('id',$feedbackID)->update(['answer'=>$feedbackanswer]);

        return redirect()->route('statisticalofficerfeedbacks.index')->with('success','Feedback Answered successfully.');


    }


    public function headmasterfeedbacksformmanager(Request $request){

        $feedbackanswer = request('answers');
        $feedbackID = request('id');

        HeadmastersFeedback::where('id',$feedbackID)->update(['answer'=>$feedbackanswer]);

        return redirect()->route('statisticalofficerfeedbacks.index')->with('success','Feedback Answered successfully.');


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
