<?php

namespace App\Http\Controllers;
use App\Council;
use App\Region;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoadcouncilController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $regions=Region::all();
        return view('pages.admin.loadcouncils.index',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Council $council){

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id){


    }


}
