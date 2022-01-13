<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\books_info;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{




//    public function books_info(Request $request){
//
//
//        $places = \DB::table('books')->get();
//        $response = \Response::json($places)->setStatusCode(200, 'Success');
//
//        return $response;
//
//
////        $creds = $request->only(['email','password','name']);
////
////        if (!$token = auth()->attempt($creds)){
////            return response()->json([
////                'success' => false,
////                'message' => 'invalid email or password'
////            ]);
////        }
////
////        return response()->json([
////            'success'=>true,
////            'token'  =>$token,
////            'user'   =>Auth::User()
////        ]);
//
//
//        {
////        $post = PostText::latest()->paginate(15);
////        return response()->json($post,200);
//        }
//
//
//    }
//
////    public function index()
////    {
//        $d=DB::table('post_texts')->select('post_texts.text_ref'
//            ,'post_texts.text_feedback')->where('post_texts.text_ref'
//            ,'=',$text_ref)->get();
//////        return  response()->json($d,200);
////    }
//
//
//    public function index(){
//
//        $products  = books_info::all();
//
//        $response["books"] = $products;
//
//        $response["success"] = 1;
//
//        return response()->json($response);
//
//    }



//public function __construct(){
//    $this->middleware('auth:api',['except'=>['login']]);
//}


    public function index(){

        $products  = books_info::all();

        $response["books"] = $products;

        $response["success"] = 1;

        return response()->json($response);

    }


    public function login(Request $request){

        $creds = $request->only(['email','password']);

        if (!$token = auth()->attempt($creds)){
            return response()->json([
                'success' => false,
                'message' => 'invalid email or password'
            ]);
        }

        return response()->json([
            'success'=>true,
            'token'  =>auth()->guard('api')->attempt($creds),
            'user'   =>Auth::User()
        ]);
    }



    public function update(Request $request,$id){

        $encryptedpass = Hash::make($request->password);
        $user = User::find($id);
        $user->email=$request->email;
        $user->password=$encryptedpass;
        $user->update();

        return response()->json([
            'success'=>true
        ]);

    }



    public function register(Request $request){
        $encryptedpass = Hash::make($request->password);

        $user = new User;

        try {
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$encryptedpass;
            $user->save();
            return $this->login($request);
        }catch (Exception $e){
            return response()->json([
                'success'=>false,
                'message'  => ''.$e
            ]);
        }

    }



    public function logout(Request $request){

        try {
            JWTAuth::invalidate(JWTAuth::ParseToken($request->token));
            return response()->json([
                'success'=>true,
                'message'  => 'logout success'
            ]);

        }catch (Exception $e){
            return response()->json([
                'success'=>false,
                'message'  => ''.$e
            ]);
        }

    }

}
