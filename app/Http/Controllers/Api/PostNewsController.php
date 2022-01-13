<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class PostNewsController extends Controller
{
    public function get(){    //get all books
        $newsPosts  = News::all();
        return response()->json([
            'success'=>true,
            'newsposts'   =>$newsPosts
        ]);


//        return response()->json([
//            'success'=>true,
//            'newsposts'=>array(
//
//                [
//                'file'=>'pdffile.pdf',
//                'date'=>'01 May, 2021',
//                'desc'=>'Kongamano la 1 walimu pamoja na sikukuu ya wafanyakazi kitaifa (mei mosi 01/05/2021)',
//                'title'=>'Kongamano la 1 la walimu',
//                'id'=>'1',
//            ],[
//                'file'=> 'interblocks.jpg',
//                'date'=>'02 May, 2021',
//                'desc'=>'Kongamano la 2 walimu pamoja na sikukuu ya wafanyakazi kitaifa (mei mosi 01/05/2021)',
//                'title'=>'Kongamano la 2 la walimu',
//                'id'=>'2',
//            ],[
//                'file'=>'udom.png',
//                'date'=>'03 May, 2021',
//                'desc'=>'Kongamano la 3 walimu pamojafgdkrgkgkl;hgl;glglrglgl na sikukuu ya wafanyakazi kitaifa (mei mosi 01/05/2021)',
//                'title'=>'Kongamano la 3 la walimu',
//                'id'=>'3',
//            ],
//                [
//                    'file'=>'file1.jpg',
//                    'date'=>'04 May, 2021',
//                    'desc'=>'Kongamano la 4 walimu pamoja na sikukuu ya wafanyakazi kitaifa (mei mosi 01/05/2021)',
//                    'title'=>'Kongamano ggml;,gl;,gl;t,gg,lg,lg;,;,g;,la 4 la walimu',
//                    'id'=>'4',
//                ]
//
//            ,[
//                    'file'=>'file2.jpg',
//                    'date'=>'05 May, 2021',
//                    'desc'=>'Kongamano la 5 walimu pamoja na sikukuu ya wafanyakazi kitaifa (mei mosi 01/05/2021)',
//                    'title'=>'Kongamano la 5 la walimu',
//                    'id'=>'5',
//                ]
//
//            ,[
//                    'file'=>'file3.png',
//                    'date'=>'06 May, 2021',
//                    'desc'=>'Kongamano la 6 walimu pamoja na sikukuu ya0',
//                    'title'=>'Kongamano la 6 la walimu',
//                    'id'=>'6',
//                ]
//
//            )
//
//        ]);
    }

}

