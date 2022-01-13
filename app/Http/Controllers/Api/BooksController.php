<?php


namespace App\Http\Controllers\Api;


use App\Book;
use App\Book_category;
use App\Bookrequest;
use App\Http\Controllers\Controller;
use App\Models\books_info;
use App\School_information;
use App\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{


    //add books
    public function add(Request $request){
        $books = new Bookrequest();
        try {
            $books->book_category_id=$request->book_category_id;
            $books->book_id=$request->book_id;
            $books->standard_id=$request->standard_id;
            $books->school_id=$request->school_id;
            $books->council_id=$request->council_id;
            $books->region_id=$request->region_id;
            $books->requested_quantity=$request->requested_quantity;
            $books->save();

               //alternative2

//            DB::table('bookrequests')
//                ->insert(
//                    [
//                        'book_category_id'=>$request->book_category_id,
//                        'book_id'=>$request->book_id,
//                        'standard_id'=>$request->standard_id,
//                        'school_id'=>$request->school_id,
//                        'council_id'=>$request->council_id,
//                        'region_id'=>$request->region_id,
//                    ]
//                );


//
//            DB::table('bookrequests')
//                ->insert(
//                    [
//                        'book_category_id'=>"1",
//                        'book_id'=>"2",
//                        'standard_id'=>"3",
//                        'school_id'=>"4",
//                        'council_id'=>"5",
//                        'region_id'=>"6",
//                    ]
//                );

            //alternative2


            return response()->json([
                'success'=>true,
                'message'  => 'books added successfully'
            ]);

//            return $this->login($request);
        }catch (Exception $e){
            return response()->json([
                'success'=>false,
                'message'  => ''.$e
            ]);
        }
    }

    //get books
    public function retrieve($standard_id){

        $books = DB::table('book_categories')
            ->join('books', 'book_categories.book_id', '=', 'books.id')
            ->where('book_categories.standard_id','=',$standard_id)
            ->groupBy('books.id')
            ->get();

        return response()->json([
            'success'=>true,
            'books'   =>$books,
        ]);
    }



    //get books  categories
    public function get($book_id){
        $books= Book_category::where('book_id','=',$book_id)->get();
        return response()->json([
            'success'=>true,
            'bookscategory'   =>$books
        ]);
    }


    //get standards
    public function standards($council_id){
        $standards= School_information::where('school_id','=',$council_id)->get();
        return response()->json([
            'success'=>true,
            'standards'   =>$standards
        ]);
//        $response["standards"] = $standards;
//        $response["success"] = 1;
//        return response()->json($standards);

    }


    //get standards by name
    public function receive($standard_id){
        $standard_name = Standard::where('id','=',$standard_id)->first();
        return response()->json([
            'success'=>true,
            'standard_name'   =>$standard_name->name
        ]);
//        $response["standards"] = $standards;
//        $response["success"] = 1;
//        return response()->json($standards);

    }

//    public function index(){

//        $books  = book::all();

//        $response["books"] = $books;
//
//        $response["success"] = 1;
//
//        return response()->json($response);


//        $regions= DB::table('regions')
//            ->select('regions.*')
//            ->where('regions.id','=' ,1)->first();
//


//        $authuser=   Auth::User()->id;
//        $schools=DB::table('users')
//            ->join('schools','schools.id','=','users.school_id')
//            ->join('councils','councils.id','=','schools.council_id')
//            ->join('regions','regions.id','=','councils.region_id')
//            ->join('standards','schools.id','=','standards.school_id')
//            ->join('books','standards.id','=','books.standard_id')
//            ->join('book_categories','standards.id','=','books.standard_id')
//            ->select(
////                'regions.name as regname',
////                   'standards.name as standard',
////                'books.name as bookname',
////                'councils.name as councilname',
////                'users.*'
//                'schools.name as schoolname'
////                'schools.id as school_id'
//            )
////            ->where('users.id','=' ,$authuser)->first();
//        ->where('users.id','=' ,22)->first();


//        $schoolinformation=School_information::where('school_id','=',15)
//        $books= Book::with('bookcategorys')->where('id','=',2)->get();
//
//        return response()->json([
//            'success'=>true,
//            'books'   =>$books
//            'region_name'   =>$schools->regname,
//            'school_id'     =>$schools->school_id,
//            'standards'     =>$schools->standard->list(),
//            'books'         =>$schools->bookname,
//            'council_name'  =>$schools->councilname
//        ]);


//        return response()->json([
//            'success'=>true,
//            'school_name'   =>$schools->name,
////            'region_name'   =>$schools->regname,
////            'school_id'     =>$schools->school_id,
////            'standards'     =>$schools->standard->list(),
////            'books'         =>$schools->bookname,
////            'council_name'  =>$schools->councilname
//        ]);


//    }
//
}
