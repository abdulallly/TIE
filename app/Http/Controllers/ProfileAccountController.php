<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProfileAccountController extends Controller{
    public function index(){
        $user_id=Auth::user()->id;
        $user = User::find($user_id);
        return view('pages.admin.user.profile',compact('user'));
    }
}
