<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Machapisho;
use App\News;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $machapishos= DB::table('news')->get();
        return view('pages.admin.news.index',compact('machapishos'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('pages.admin.news.create');
    }

    public function newsuploadedheads(){

        $machapishos=News::all();
        return view('pages.admin.news.indexhead',compact('machapishos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'file' => 'required|file|mimes:pdf,jpg,png'
        ]);
        $machapicho=new News();
        $file = $request->file('file');
        $name = $request->name.'.'.$request->file->extension();
        $destinationPath = 'uploads/newsposts';
        $machapichoPath = $destinationPath. "/".  $name;
        $file->move($destinationPath, $name);

        $authuserID = Auth::user()->id;
        $now = Carbon::now();
        $currentdate=$now->format('Y-m-d');
        $title= request('name');
        $description= request('description');
        $machapicho->path = $machapichoPath;
        $machapicho->file=$name;
        $machapicho->title=$title;
        $machapicho->description=$description;
        $machapicho->date = $currentdate;
        $machapicho->user_id = $authuserID;
        $machapicho->save();

//        return \response()->json($newsposts);
        return redirect()->route('newsuploads.index')->with('success','News imetengenezwa Kikamilifu');

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
     * @return \Illuminate\Http\Response
     */
    public function edit(){

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
       News::find($id)->delete();
        return redirect()->back()->with('success','News deleted successfully!!');
    }
    public function viewpdf($id){
        $pdffile= DB::table('news')
            ->select('news.path' )
            ->where ('news.id','=',$id)->first();
        return view('pages.admin.news.pdf',compact('pdffile'));
    }
}
