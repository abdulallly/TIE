<?php

namespace App\Http\Controllers;

use App\Council;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Invoicereference;
use App\Region;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $regions= DB::table('regions')
                ->select('regions.*')
                ->paginate(20);
        return view('pages.admin.regions.index',compact('regions'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('pages.admin.regions.create');
    }

    public function createPDF() {
        // retreive all records from db
        $data = Region::all();

        // share data to view
        view()->share('regions',$data);
//        $pdf = (newPDF)->loadView('pdf_view', $data);
        $pdf = PDF::loadView('pages.admin.regions.view-pdf', $data);

        // download PDF file with download method
        return $pdf->download('regions.pdf');
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
            'name' => 'required|unique:regions',
        ]);
        $region_names = request('name');
        foreach ($region_names as $region_name) {
            $regions = new Region();
            $regions->name = $region_name;
            $regions->save();
        }
        return redirect()->route('regions.index')->with('success','Region created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $regions= Region::find($id);
        $councils=DB::table('councils')
            ->join('regions','regions.id','=','councils.region_id')
            ->select('councils.name as council_name','councils.code as council_code')
            ->where('councils.region_id','=',$id)
            ->paginate(20);
        return view('pages.admin.regions.show',compact('regions','councils'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region){
        return view('pages.admin.regions.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){
         $this->validate($request, [
            'name' => 'required',
        ]);
        $region =Region::find($id);
        $region->name = $request->get('name');
        $region->update();
        return redirect()->route('regions.index')->with('success','Region updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        Region::find($id)->delete();
        return redirect()->route('regions.index')
            ->with('success','Region deleted successfully!!');
    }

    public function getCouncil(Request $request,$id){

        $councils=DB::table('councils')
            ->select('name','id')
            ->where('region_id','=',$id)
            ->orderBy('id','ASC')->paginate(20);
        return view('pages.invoice.councilindex',compact('councils')) ->with('i', ($request->input('page', 1) - 1) * 20);

    }



    public function getinvoicerefnumber($id){

        $invoices=Invoicereference::where('invoicereferences.council_id','=',$id)->get();
        return view('pages.invoice.invoicerefnoindex',compact('invoices'));

    }

    public function getInvoicerefnumbereDetails($id){

        $invoicesDetails= Invoice::where('invoicerefnumber', '=', $id)->get();
                return view('pages.invoice.invoicesrefdetails',compact('invoicesDetails'));
    }

}
