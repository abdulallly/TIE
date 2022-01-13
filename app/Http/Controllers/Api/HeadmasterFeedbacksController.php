<?php


namespace App\Http\Controllers\Api;


use App\Bookrequest;
use App\HeadmastersFeedback;
use App\Http\Controllers\Controller;
use App\School_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeadmasterFeedbacksController extends Controller
{



    public function send(Request $request){

//        $staticalOfficer=DB::table('users')
//            ->select('users.*')
//            ->where('council_id','=' ,$council_id)->first();


       /* $staticalOfficer->user_id;//returned userid */


        try {
//            //alternative 1

            $headmaster = new HeadmastersFeedback();
            $headmaster->qstn=$request->qstn;
            $headmaster->school_id=$request->school_id;
            $headmaster->council_id=$request->council_id;
            $headmaster->region_id=$request->region_id;
            $headmaster->headmaster_id=$request->headmaster_id;
            $headmaster->save();


            //alternative2

//            DB::table('headmastersfeedbacks')
//                ->insert(
//                    [
//                        'qstn'=>$request->qstn,
//                        'school_id'=>$request->school_id,
//                        'council_id'=>$request->council_id,
//                        'region_id'=>$request->region_id,
//                        'headmaster_id'=>$request->headmaster_id
//                    ]
//                );

            //alternative2

            return response()->json([
                'success'=>true,
//                'success2'=>$staticalOfficer->id,
//                'message'  => 'feedback sent successfully to '. $staticalOfficer->firstname.' '.$staticalOfficer->lastname.' The statistacl officer of Your council'
            ]);

//            return $this->login($request);
        }catch (Exception $e){
            return response()->json([
                'success'=>false,
                'message'  => ''.$e
            ]);
        }


    }


    public function get($council_id){

        $answers=HeadmastersFeedback::where('council_id','=' ,$council_id)->get();
        return response()->json([
            'success'=>true,
            'feedbacks'  => $answers
        ]);

    }

    public function retrieve($region_id){

        $answers=HeadmastersFeedback::where('region_id','=' ,$region_id)->get();
        return response()->json([
            'success'=>true,
            'feedbacks'  => $answers
        ]);

    }

}
