<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_category;
use App\Bookrequest;
use App\Council;
use App\Headmaster;
use App\HeadmastersFeedback;
use App\Invoice;
use App\Invoicereference;
use App\News;
use App\Region;
use App\School;
use App\School_information;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\User;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $user_id=Auth::user()->id;
        $user = User::find($user_id);


//project manager
        $booktype=Book::count();
        $users=User::where('status','=',0)->count();
        $council=Council::count();
        $region=Region::count();
        $school=School::count();
        $feedbacks=HeadmastersFeedback::count();
        $invoicerefall=Invoicereference::count();
        $invoiceinprogressstat=Invoicereference::where('received_invoice_stat','=',0)->count();
        $invoiceacceptedbystat=Invoicereference::where('received_invoice_stat','=',1)->count();

        $invoiceacceptedbyhead = Invoice::where('received_invoice_by_head', '=', 1)
            ->distinct('invoicerefnumber')
            ->count();
        $invoiceinprogresssbyhead = Invoice::where('received_invoice_by_head', '=', 0)
            ->distinct('invoicerefnumber')
            ->count();
        $bookrequest = Bookrequest::count();
        $bookcategory = Book_category::count();


//HEADMASTER
      if(auth()->user()->hasRole('headmaster')) {
          $authuser = Auth::user()->id;
          $head_id = DB::table('users')->join('headmasters', 'users.id', '=', 'headmasters.user_id')->select('users.school_id')
              ->where('users.id', '=', $authuser)->first();
          foreach ($head_id as $headidd) {
              $school_id = $headidd;
          }
          $bookrequesthead = Bookrequest::where('school_id', '=', $school_id)->count();
          $news = News::count();
          $invoiceacceptedbyhead = Invoice::where('received_invoice_by_head', '=', 1)->where('school_id', '=', $school_id)->distinct('invoicerefnumber')->count();
          $invoiceinprogresssbyhead = Invoice::where('received_invoice_by_head', '=', 0)->where('school_id', '=', $school_id)
              ->distinct('invoicerefnumber')->count();
          return view('pages.dashboard.home',compact('user','news','invoiceinprogresssbyhead','invoiceacceptedbyhead','bookrequesthead'));
      }

        if(auth()->user()->hasRole('statisticalofficer')) {
            $authuser = Auth::user()->id;
            $head_id = DB::table('users')->join('statisticalofficers', 'users.id', '=', 'statisticalofficers.user_id')->select('users.council_id')
                ->where('users.id', '=', $authuser)->first();
            foreach ($head_id as $headidd) {
                $council_id = $headidd;
            }
            $schoolstat = School::where('council_id', '=', $council_id)->count();
            $news = News::count();
            $headmastercouncil = User::where('council_id','=',$council_id)
                ->where('school_id','!=',null)
                ->count();
            $invoiceacceptedbystat = Invoice::where('received_invoice_stat', '=', 1)->where('council_id', '=', $council_id)->distinct('invoicerefnumber')->count();
            $invoiceinprogresssbystat = Invoice::where('received_invoice_stat', '=', 0)->where('council_id', '=', $council_id)
                ->distinct('invoicerefnumber')->count();
            return view('pages.dashboard.home',compact('user','headmastercouncil','schoolstat','news','invoiceinprogresssbystat','invoiceacceptedbystat'));
        }
        return view('pages.dashboard.home',compact('user','booktype','feedbacks','council','region','invoicerefall','invoiceinprogressstat','users','school','invoiceacceptedbystat','invoiceinprogresssbyhead','invoiceacceptedbyhead','bookrequest','bookcategory'));
    }
}
