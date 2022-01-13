<?php

namespace App\Http\Controllers;

use App\Council;
use App\Region;
use App\School;
use App\School_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SchoolController extends Controller
{
    function __construct(){
        $this->middleware('permission:-view|school-create|school-edit|school-delete', ['only' => ['index','show']]);
        $this->middleware('permission:school-create', ['only' => ['create','store']]);
        $this->middleware('permission:school-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:school-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index(Request $request){
        $schools= School::orderBy('id','ASC')->paginate(20);
        return view('pages.admin.schools.index',compact('schools'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }
    public function create(){
            $regions= Region::all();
            return view('pages.admin.schools.create',compact('regions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'region_id' => 'required',
            'council_id' => 'required'
        ]);
        $council_id= request('council_id');
        $region_id= request('region_id');
        $name = request('name'); // Returns an array of name from the form
        foreach ($name as  $value) {
            $schools = new School();
            $schools->name = $value;
            $schools->council_id = $council_id;
            $schools->region_id = $region_id;
            $schools->save();
        }
        return redirect()->route('schools.index')->with('success','School created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $schools= School::find($id);
        $schools_info= School_information::where('school_id','=',$id)->get();
//        return response()->json($schools_info);
        return view('pages.admin.schools.show',compact('schools','schools_info'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(School $school){
            $councilId=$school->council_id;
            $region_id=  DB::table('regions')
                ->join('councils','councils.region_id','regions.id')
                ->select('regions.id')
                ->where('councils.id','=',$councilId)->first();
            $selectedRegionvalue=$region_id->id;
            $selectedvalue=$school->council_id;
            $regions= Region::all();
            $councils= Council::all();
            return view('pages.admin.school.edit',compact('school','councils','selectedvalue','regions','selectedRegionvalue'));
    }

      public function getCouncils($id){
        $regionId=DB::table('regions')
            ->select('regions.id')
            ->where('id','=',$id)
            ->first();
          foreach ($regionId as $ids) {
              $councils = DB::table('councils')
                  ->select('councils.name','councils.id')
                  ->where('councils.region_id', '=', $ids)
                  ->get();
          }
          return response()->json($councils);

    }
    public function getSchools($id){
        $council_Id=DB::table('councils')
            ->select('councils.id')
            ->where('id','=',$id)
            ->first();
          foreach ($council_Id as $ids) {
              $schools = DB::table('schools')
                  ->select('schools.name','schools.id')
                  ->where('schools.council_id', '=', $ids)
                  ->get();
          }
          return response()->json($schools);

    }


    public function getSchool($id){
        $schoolsdetails= Council::with('schools')
            ->where('id','=',$id)
            ->get();
        return response()->json($schoolsdetails);
    }

    public function getStandard($id){

      $standards = DB::table('school_informations')
                ->join('standards','standards.id','=','school_informations.standard_id')
                ->select('school_informations.standard_id','standards.name','school_informations.male','school_informations.female')
                ->where('school_informations.school_id', '=', $id)
                ->get();

         return response()->json($standards);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mutipleremoveschool(Request $request){
            $school = request('school_id');
            if (is_array($school)==[]) {
                return Redirect::back()->with('warning','Select school to Delete!');
            }
            else {
                if (is_array($school)) {
                    School::destroy($school);
                }
                return Redirect::back()->with('success', 'Schools deleted successfully!');
            }

    }
    public function destroy($id){
        School::find($id)->delete();
        return redirect()->route('schools.index')
            ->with('success','School deleted successfully!!');
    }
}
