<?php

namespace App\Http\Controllers;

use App\Council;
use App\Region;
use App\School;
use App\School_information;
use App\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class School_informationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){


        $school_info=Region::orderBy('id','ASC')->paginate(20);
        return view('pages.school_information.regionindex',compact('school_info'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function councilindex(Request $request,$id){


        $school_info=Council::where('region_id','=',$id)->orderBy('id','ASC')->paginate(20);
//        $school_info= School_information::orderBy('id','ASC')->paginate(20);
        return view('pages.school_information.councilindex',compact('school_info'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function schoolindex(Request $request,$id){
        $school_info=School::where('council_id','=',$id)->orderBy('id','ASC')->paginate(20);
        return view('pages.school_information.index',compact('school_info'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function school_info(Request $request){
        $school_info=School::orderBy('id','ASC')->paginate(20);
        return view('pages.school_information.index',compact('school_info'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $regions= Region::all();
        $standards= Standard::all();
        return view('pages.school_information.create',compact('regions','standards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $request->validate([
            'male' => 'required',
            'female' => 'required',
            'regions_id' => 'required',
            'councils_id' => 'required',
            'schools_id' => 'required',
            'standard_id' => 'required'
        ]);



        $region_id= request('regions_id');
        $council_id= request('councils_id');
        $school_id= request('schools_id');
        $standard_id= request('standard_id');

//         if($school_id == ){
//
//         }else{
//
//         }


        $schoolinfo=School_information::where('school_id','=',$school_id)
            ->select('standard_id')
            ->get();
        if(count($schoolinfo) > 0){

            $schoolinfo=School_information::where('school_id','=',$school_id)
                ->select('standard_id')
                ->get();

            foreach ($schoolinfo as $schoolInform){
                $schoolInformation=$schoolInform;
            }

            if($standard_id == $schoolInformation->standard_id){
                return redirect()->route('Schoolinformation.create')->with('failed','Please  '.$schoolInformation->standard->name.' is Already exist');
            }else{
                $male = request('male');
                $female = request('female');
                $schoolinfor=new School_information();
                $schoolinfor->male=$male;
                $schoolinfor->female=$female;
                $schoolinfor->standard_id=$standard_id;
                $schoolinfor->school_id=$school_id;
                $schoolinfor->council_id=$council_id;
                $schoolinfor->region_id=$region_id;
                $schoolinfor->save();
                return redirect()->route('Schoolinformation.create')->with('success','School information upated successfully.');

            }

        }else{
            $male = request('male');
            $female = request('female');
            $schoolinfor=new School_information();
            $schoolinfor->male=$male;
            $schoolinfor->female=$female;
            $schoolinfor->standard_id=$standard_id;
            $schoolinfor->school_id=$school_id;
            $schoolinfor->council_id=$council_id;
            $schoolinfor->region_id=$region_id;
            $schoolinfor->save();
            return redirect()->route('Schoolinformation.create')->with('success','School information upated successfully.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request,$id)
    {
        $schoolinfo=School_information::where('school_id','=',$id)->orderBy('id','ASC')->paginate(20);
        return view('pages.school_information.schoolinfo', compact('schoolinfo')) ->with('i', ($request->input('page', 1) - 1) * 20);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $school_Id = DB::table('school_informations')
            ->select('school_informations.school_id')
            ->where('school_informations.id', '=', $id)
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
        $region_Id = DB::table('school_informations')
            ->select('school_informations.region_id')
            ->where('school_informations.id', '=', $id)
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
        $regions=Region::all();
        $council_Id = DB::table('school_informations')
            ->select('school_informations.council_id')
            ->where('school_informations.id', '=', $id)
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
        $councils=Council::all();
        $standard_Id = DB::table('school_informations')
            ->select('school_informations.standard_id')
            ->where('school_informations.id', '=', $id)
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
        $standards=Standard::all();
        $schoolinfo = DB::table('school_informations')
            ->select('school_informations.*')
            ->where('school_informations.id', '=', $id)
            ->get();
        foreach ($schoolinfo as $r){
            $schoolinformation=$r;
        }
//        return response()->json($schoolinformation);
        return view('pages.school_information.edit', compact('schools','selectedvalueschool_id','regions','selectedvalueregion_id','councils','selectedvaluecouncil_id','standards','selectedvaluestandard_id','schoolinformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){
        $request->validate([
            'male' => 'required',
            'female' => 'required',
            'standard_id' => 'required'
        ]);
        $standard_id= request('standard_id');
        $male = request('male');
        $female = request('female');
        $schoolinfor=School_information::find($id);
        $schoolinfor->male=$male;
        $schoolinfor->female=$female;
        $schoolinfor->standard_id=$standard_id;
        $schoolinfor->update();
//        return response()->json($schoolinfor);
        return redirect()->route('Schoolinformation.create')->with('success','School information upated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        School_information::find($id)->delete();
        return redirect()->back()->with('success','School information deleted successfully!!');
    }
}
