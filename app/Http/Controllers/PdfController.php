<?php

namespace App\Http\Controllers;

use App\User;
use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller{
    public function create()
    {
//        $data = ['title' => 'Laravel 7 Generate PDF From View Example Tutorial'];
//        $pdf = PDF::loadView('pdf', $data);
//
//        return $pdf->download('Nicesnippets.pdf');
        $students = User::all();
        $pdf = PDF::loadView('student.list', $students);
//        $pdf->save(storage_path().'_student.pdf');
        return $pdf->download('student.pdf');
    }
}
