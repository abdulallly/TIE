<?php


namespace App\Http\Controllers\Api;


use App\Book;
use App\Book_category;
use App\Bookrequest;
use App\Council;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Region;
use App\School;
use App\Standard;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class InvoicesController extends Controller
{

    public function get(Request $request){


        $invoices = DB::table('invoices')
            ->join('councils', 'invoices.council_id', '=', 'councils.id')
            ->join('books', 'invoices.book_id', '=', 'books.id')
            ->join('book_categories', 'invoices.book_category_id', '=', 'book_categories.id')
            ->join('standards', 'invoices.standard_id', '=', 'standards.id')
            ->where('invoices.school_id','=',$request->school_id)
            ->where('invoices.council_id','=',$request->council_id)
            ->where('invoices.generated_invoice','=',1)
            ->groupBy('invoices.invoicerefnumber')  //equals to distinct(eliminating redundancy rows)
            ->get();
        return response()->json([
            'success'=>true,
            'invoices'   =>$invoices
        ]);
    }

    public function headmasterinvoicedetails(Request $request,$invoicenumber){

    $head_id=DB::table('users')
        ->join('headmasters','users.id','=','headmasters.user_id')
        ->select('users.school_id')
        ->where('users.id','=',$request->headmaster_id)
        ->first();
    foreach ($head_id as $headidd){
        $schholID=$headidd;
    }
    $invoices=DB::table('invoices')
        ->join('standards','standards.id','=','invoices.standard_id')
        ->where('invoices.generated_invoice','=',1)
        ->where('invoices.school_id','=',$schholID)
        ->where('invoicerefnumber', '=', $invoicenumber)->get();

//        ->where('invoices.generated_invoice','=',1)->get();

        return response()->json([
            'success'=>true,
            'invoices'   =>$invoices
        ]);
}

    //book requests table
    public function requests($school_id){

        //get all ids in book requests
        $invoices= Bookrequest::where('school_id','=',$school_id)->get();

        $arr = array();

        foreach ($invoices as $allbooksrequestd){

            $region = Region::where('id','=',$allbooksrequestd->region_id)->first();
            $council = Council::where('id','=',$allbooksrequestd->council_id)->first();
            $arr = array($region->name,$council->name);

        }


        return response()->json([
            'success'=>true,
            'region_name'   =>$arr[1],
//            'council_name'   =>$council->name
        ]);


    }

    public function retrieve(Request $request){  //mabadiliko
        $school_name = School::where('id','=',$request->school_id)->first();
        $council_name = Council::where('id','=',$request->council_id)->first();
        $region_name = Region::where('id','=',$request->region_id)->first();
        $emailfrom = User::where('region_id','=',$request->region_id)->first();
        $emailto = User::where('school_id','=',$request->school_id)->first();
        $books = DB::table('books')
            ->join('book_categories', 'book_categories.book_id', '=', 'books.id')
            ->select('books.name as book_name','book_categories.name as book_category_name')
            ->where('books.id','=',$request->book_id)
            ->where('book_categories.id','=',$request->book_category_id)
            ->first();
        return response()->json([
            'success'=>true,
            'school_name'   =>$school_name->name,
            'council_name'   =>$council_name->name,
            'book_name'   =>$books->book_name,
            'region_name'   =>$region_name->name,
            'book_category_name'   =>$books->book_category_name,
            'emailfrom'   =>$emailfrom->email,
            'emailto'   =>$emailto->email,
        ]);

    }

    public function update(Request $request){
        $invoice = Invoice::find($request->id);
        $invoice->headmaster_id=$request->headmaster_id;
        $invoice->received_invoice_by_head=$request->received_invoice_by_head;
        $invoice->accepted_date_by_head=$request->accepted_date_by_head;
        $invoice->update();

        return response()->json([
            'success'=>true,
        ]);

    }

}
