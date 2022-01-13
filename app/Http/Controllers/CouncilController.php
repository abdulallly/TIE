<?php

namespace App\Http\Controllers;
use App\Council;
use App\Region;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CouncilController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $councils= Council::orderBy('id','ASC')->paginate(20);
        return view('pages.admin.councils.index',compact('councils'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }
//    public function loadCouncil($regionId) {
//
//        $councils=DB::table('councils')
//            ->join('regions','regions.id','=','councils.region_id')
//            ->select('councils.*')
//            ->where('councils.region_id','=',$regionId)
//            ->get();
//        return response()->json($councils);
//    }
//    public function loadSchool($councilId) {

//        $councils=DB::table('councils')
//            ->join('regions','regions.id','=','councils.region_id')
//            ->select('councils.*')
//            ->where('councils.region_id','=',$regionId)
//            ->get();
//        return response()->json($councilId);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $regions=Region::all();
        return view('pages.admin.councils.create',compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:councils',
            'code' => 'required',
            'region_id' => 'required'
        ]);
        $region_id = request('region_id'); // Returns an array of values from the form
        $code = request('code'); // Returns an array of code from the form
        $name = request('name'); // Returns an array of name from the form

        foreach ($name as $key => $value) {
            $councils = new Council();
            $councils->name = $value;
            $councils->code =$code[$key];
            $councils->region_id = $region_id;
            $councils->save();
        }
        return redirect()->route('councils.index')->with('success','Council created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $councils= Council::find($id);
        $schools=DB::table('schools')
            ->join('councils','councils.id','=','schools.council_id')
            ->select('schools.name as school_name')
            ->where('schools.council_id','=',$id)
            ->paginate(20);
        $users=DB::table('users')
            ->join('councils','councils.id','=','users.council_id')
            ->select('users.email as useremail','users.firstname as firstname','users.lastname as lastname')
            ->where('users.council_id','=',$id)
            ->paginate(20);
        return view('pages.admin.councils.show',compact('schools','councils'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Council $council){
            $regions= Region::all();
            $selectedvalue=$council->region_id;
            return view('pages.admin.councils.edit',compact('council','regions','selectedvalue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Draft $draft
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id){
        $this->validate($request, [
                'name' => 'required',
                'code' => 'required',
                'region_id' => 'required'
            ]);

            $input = $request->all();
            $council = Council::find($id);
            $council->update($input);
            $region_id=$request->input('region_id');
            DB::table('councils')->where('id','=',$id)
                ->update(['region_id' => $region_id]);

            return redirect()->route('councils.index')
                ->with('success','Councils  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id){
        Council::find($id)->delete();
        return redirect()->route('councils.index')
            ->with('success','Council deleted successfully!!');

    }
    public function mutipleremovecouncil(Request $request){
            $councils = request('council_id');
            if (is_array($councils)==[]) {

                return Redirect::back()->with('warning','Select council to delete!');

            }
            else{
                if (is_array($councils)) {

                    Council::destroy($councils);

                }
                return Redirect::back()->with('success','Councils  deleted successfully!');

            }
    }
}
