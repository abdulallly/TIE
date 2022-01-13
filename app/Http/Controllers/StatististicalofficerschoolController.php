<?php

namespace App\Http\Controllers;

use App\Council;
use App\Region;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class StatististicalofficerschoolController extends Controller
{
    function __construct(){
//        $this->middleware('permission:-view|school-create|school-edit|school-delete', ['only' => ['index','show']]);
//        $this->middleware('permission:school-create', ['only' => ['create','store']]);
//        $this->middleware('permission:school-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:school-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index(Request $request){
        $user_id=Auth::user()->id;
        $council_id= DB::table('users')
            ->where('users.id','=',$user_id)
            ->select('users.council_id')
            ->first();
        foreach ($council_id as $councilid) {
             $schools = School::where(['schools.council_id' => $councilid])
             ->paginate(20);
             }
        return view('pages.admin.statisticalofficer.schools.index',compact('schools'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }
    public function create(){
            $regions= Region::all();
            return view('pages.admin.statisticalofficer.schools.create',compact('regions'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

//        if(auth()->user()->hasRole('Admin')){
//            return redirect()->back();
//        }
//        else{
            $request->validate([
                'name' => 'required',
                'region_id' => 'required',
                'council_id' => 'required'
            ]);
//            return response()->json($request);
            $council_id= request('council_id'); // Returns an array of values from the form
            $region_id= request('region_id'); // Returns an array of values from the form
            $name = request('name'); // Returns an array of name from the form
            foreach ($name as  $value) {
                $schools = new School();
                $schools->name = $value;
                $schools->council_id = $council_id;
                $schools->region_id = $region_id;
                $schools->save();
            }
            return redirect()->route('schools.index')->with('success','School created successfully.');
//        }
//


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        if(auth()->user()->hasRole('Admin')){
            return redirect()->back();
        }
        else{
            $schools=DB::table('councils')
                ->join('schools','councils.id','=','schools.council_id')
                ->join('regions','regions.id','=','councils.region_id')
                ->select('schools.*','councils.name as council','regions.name as region')
                ->where('schools.id','=',$id)
                ->first();
            return view('pages.admin.school.show',compact('schools'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(School $school){

        if(auth()->user()->hasRole('Admin')){
            return redirect()->back();
        }
        else{
            $councilId=$school->council_id;
//
            $region_id=  DB::table('regions')
                ->join('councils','councils.region_id','regions.id')
                ->select('regions.id')
                ->where('councils.id','=',$councilId)->first();
            $selectedRegionvalue=$region_id->id;
            $selectedvalue=$school->council_id;

            $regions= Region::all();
            $councils= Council::all();

//        return response()->json($selectedRegionvalue);
//
            return view('pages.admin.school.edit',compact('school','councils','selectedvalue','regions','selectedRegionvalue'));
        }

//
    }

      public function getUserByDivision($divisionID){

          if(auth()->user()->hasRole('Admin')){
              return redirect()->back();
          }
          else{
              $headofsections = Region::with('councils')->where('id','=',$divisionID)->get();
              return Response()->json($headofsections);
          }

         }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, School $school){
//
//        $request->validate([
//            'name' => 'required',
//            'code' => 'required',
//            'region_id' => 'required'
//        ]);

//        $input = $request->all();
//        $council = School::find($school);
//        $council->update($input);
//        $region_id=$request->input('region_id');
//        DB::table('councils')->where('id','=',$id)
//            ->update(['region_id' => $region_id]);
//
//        return redirect()->route('councils.index')
//            ->with('success','Councils  updated successfully');
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mutipleremoveschool(Request $request){

//        if(auth()->user()->hasRole('Admin')){
//            return redirect()->back();
//        }
//        else{

            $school = request('school_id');
            if (is_array($school)==[]) {
                return Redirect::back()->with('warning','Select school to delete!');
            }
            else{
                if (is_array($school)) {
                    School::destroy($school);
                }
                return Redirect::back()->with('success','Schools deleted successfully!');
        }

//        }
    }
}
