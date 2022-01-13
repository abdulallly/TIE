<?php

namespace App\Http\Controllers;

use App\Headmaster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HeadmasterController extends Controller{
    function __construct(){
//        $this->middleware('permission:headmaster-view|headmaster-create|headmaster-edit|headmaster-delete', ['only' => ['index','show']]);
//        $this->middleware('permission:headmaster-create', ['only' => ['create','store']]);
//        $this->middleware('permission:headmaster-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:headmaster-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $headmaster = User::role('headmaster')
            ->select('users.*')
            ->paginate(20);
        return view('pages.admin.headmaster.index',compact('headmaster'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $user_id=Auth::user()->id;
        $council_id= DB::table('users')
            ->where('users.id','=',$user_id)
            ->select('users.council_id')
            ->first();
        foreach ($council_id as $councilid) {
            $schools = DB::table('schools')
                ->select('schools.*')
                ->where('schools.council_id', '=', $councilid)
                ->get();
        }
        $roles = DB::table('roles')
            ->where('roles.name','!=','admin')
            ->where('roles.name','!=','statisticalofficer')
            ->where('roles.name','!=','projectmanager')
            ->select('roles.name')
            ->get();
        return view('pages.admin.headmaster.create',compact('roles','schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){

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
