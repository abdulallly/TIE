<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StandardExport;
use App\Imports\StandardImport;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function importExportView(){
        return view('import');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(){
        return Excel::download(new StandardExport(), 'users.xlsx');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(){

        Excel::import(new StandardImport(),request()->file('file'));
        return back();
    }
}
