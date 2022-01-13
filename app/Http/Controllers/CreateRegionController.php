<?php

namespace App\Http\Controllers;

use App\Region;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateRegionController extends Controller
{
    public function index(Request $request){
        $regions= DB::table('regions')
            ->select('regions.*')
            ->paginate(20);
        return view('pages.admin.regions.index',compact('regions'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function create(){
        $region= DB::table('regions')
            ->select('regions.*')
            ->paginate(20);
        // share data to view
        view()->share('regions',$region);
//        $pdf = (newPDF)->loadView('pdf_view', $data);
        $pdf = PDF::loadView('pages.admin.regions.view-pdf', $region);

        // download PDF file with download method
        return $pdf->download('regions.pdf');
    }
}
