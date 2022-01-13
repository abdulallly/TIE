<?php

namespace App\Http\Controllers;

use App\Assignsheria;
use App\Invoice;
use App\mihimili;
use App\sheria;
use App\user_institution_belong;
use App\user_law_belong;
use App\institution;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
        public function index(){
            return view('search');
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function autocomplete(Request $request){
            $data = Invoice::select("name")
                ->where("name","LIKE","%{$request->query}%")
                ->get();
            return response()->json($data);
        }


}
