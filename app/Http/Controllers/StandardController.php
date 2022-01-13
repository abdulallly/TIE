<?php

namespace App\Http\Controllers;

use App\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $standards= Standard::orderBy('id','ASC')->paginate(20);
        return view('pages.standards.index',compact('standards'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('pages.standards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:standards',
        ]);
        $name = request('name'); // Returns an array of name from the form
        foreach ($name as  $names) {
            $standards = new Standard();
            $standards->name = $names;
            $standards->save();
        }
        return redirect()->route('standards.index')->with('success','Standards created successfully.');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Standard $standard){
        return view('pages.standards.edit',compact('standard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $standard =Standard::find($id);
        $standard->name = $request->get('name');
        $standard->update();
        return redirect()->route('standards.index')->with('success','Standards updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        Standard::find($id)->delete();
        return redirect()->route('standards.index')
            ->with('success','School deleted successfully!!');
    }
}
