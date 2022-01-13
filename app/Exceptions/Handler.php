<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {

            return response()->view('pages.admin.errors.permission-error', [], 500);
//            return response()->json(['Mtumiaji hana ruhusa ya ufikiaji wa ukurasa huu.']);
        }



        // Custom render.
        if ($exception instanceof QueryException) {
            return response()->view('pages.admin.errors.serverdown', [], 500);
        }

//        if($exception instanceof \Illuminate\Session\TokenMismatchException){
//            return redirect('welcome');
//        }

//        // Add extra custom render.
//        if ($exception instanceof ModelNotFoundException) {
//
//            return response()->view('pages.admin.errors.serverdown', [], 500);
//
//
//        }

        if ($exception instanceof NotFoundHttpException) {


        //check here if the user is authenticated
            return response()->view('pages.admin.errors.pagenotfound');


        }


        //when no network connection

        if ($exception instanceof \Swift_TransportException) {
            return response()->view('pages.admin.errors.servernotfound');

        }
        //page expired
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            return redirect('/login');

        }



        return parent::render($request, $exception);
    }





}
