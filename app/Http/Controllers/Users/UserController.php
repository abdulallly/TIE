<?php
namespace App\Http\Controllers\Users;
use App\Council;
use App\Division;
use App\Headmaster;
use App\Institution;
use App\Ministry;
use App\Projectmanager;
use App\Region;
use App\School;
use App\Statisticalofficer;
use App\Wizara;
use http\Env\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;


class UserController extends Controller{
    /**
     * Display a listing of the resource.
     *
     */
    function __construct(){
        $this->middleware('permission:user-view|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        //$this->middleware('permission:role-edit', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request){
        $alluser = User::paginate(20);
        return view('pages.admin.user.index',compact('alluser'))
            ->with('i', ($request->input('page', 1) - 1) * 20);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create(){
        $roles=Role::all();
        $regions = Region::all();
        return view('pages.admin.user.create',compact('roles','regions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|unique:users',
            'phonenumber' => 'required|unique:users',
            'roles' => 'required'
        ]);
        $region_id = request('region_id');
        $council_id = request('council_id');
        $school_id = request('school_id');
        // generate random 10 char password from below chars
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);
        $user = new User();
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->phonenumber = request('phonenumber');
        /*Headmaster registration */
        if ($region_id !== null && $council_id !==null && $school_id !== null ) {
            $user->region_id = $region_id;
            $user->council_id = $council_id;
            $user->school_id = $school_id;
        }
        /*statistical officer registration*/
       elseif($region_id !== null && $council_id !==null && $user->school_id == null ) {
           $user->region_id = $region_id;
           $user->council_id = $council_id;
        }
         /*headmaster registration*/
        else
        $user->password = Hash::make($password);
        $user->assignRole($request->input('roles'));
        $user->email = $request->email; // grab the email from the posted form
        $user->save();
        $token= app('auth.password.broker')->createToken($user);
        $UserID= $user->id;
       DB::table('users')
            ->select('remember_token')
            ->where ('id','=',$UserID)
            ->update(['remember_token' => $token]);
        Mail::send('pages.admin.mailnotification.welcomemail',
            ['user' => $user,'token'=>$token], function ($m) use ($user) {
            $m->to($user->email, $user->email)->subject( $user->firstname, ' ',
                $user->lastname ,'you have been registered to DTLMMS');
        });
        return redirect()->route('users.index')->with('success','User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id){
            $user=User::find($id);
            return view('pages.admin.user.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id){
        $user_id=  DB::table('users')
            ->select('users.id')
            ->where('users.id','=',$id)->first();
        foreach ($user_id as $userid) {
            $userdata = User::where('id', '=', $userid)->get();
        }
        foreach ($userdata as $userdatas) {
            $users = $userdatas;
        }
        /*Headmaster*/
        if($users->region_id != null &&  $users->council_id != null && $users->school_id != null){
            $regions=Region::all();
            $region_id = DB::table('users')
                ->select('users.region_id')
                ->where('users.id', '=', $id)
                ->first();
            foreach ($region_id as $regionid){
                $region_ID=$regionid;
            }
            $selectedregion_id= DB::table('regions')
                ->select('regions.id')
                ->where('regions.id','=',$region_ID)
                ->first();
            foreach ($selectedregion_id as $r){
                $selectedvalueregion_id=$r;
            }
            $councils=Council::all();
            $council_id = DB::table('users')
                ->select('users.council_id')
                ->where('users.id', '=', $id)
                ->first();
            foreach ($council_id as $councilid){
                $council_ID=$councilid;
            }
            $selectedcouncil_id= DB::table('councils')
                ->select('councils.id')
                ->where('councils.id','=',$council_ID)
                ->first();
            foreach ($selectedcouncil_id as $r){
                $selectedvaluecouncil_id=$r;
            }
            $schools=School::all();
            $school_id = DB::table('users')
                ->select('users.school_id')
                ->where('users.id', '=', $id)
                ->first();
            foreach ($school_id as $schoolid){
                $school_ID=$schoolid;
            }

            $selectedschool_id= DB::table('schools')
                ->select('schools.id')
                ->where('schools.id','=',$school_ID)
                ->first();
            foreach ($selectedschool_id as $r){
                $selectedvalueschool_id=$r;
            }
            $roles = DB::table('roles')
                ->select('roles.name')
                ->get();
            $user = User::find($id);
            $userRole = $user->roles->pluck('name','name')->all();
            foreach ($userRole as $r){
                $selectedvalue=$r;
            }
            return view('pages.admin.user.edit',compact('users','roles','selectedvalueregion_id','regions','selectedvaluecouncil_id','councils','schools','selectedvalueschool_id','selectedvalue'));
        }
        /*statistical officer*/
        elseif ($users->region_id != null &&  $users->council_id != null && $users->school_id == null){
            $regions=Region::all();
            $region_id = DB::table('users')
                ->select('users.region_id')
                ->where('users.id', '=', $id)
                ->first();
            foreach ($region_id as $regionid){
                $region_ID=$regionid;
            }
            $selectedregion_id= DB::table('regions')
                ->select('regions.id')
                ->where('regions.id','=',$region_ID)
                ->first();
            foreach ($selectedregion_id as $r){
                $selectedvalueregion_id=$r;
            }
            $councils=Council::all();
            $council_id = DB::table('users')
                ->select('users.council_id')
                ->where('users.id', '=', $id)
                ->first();
            foreach ($council_id as $councilid){
                $council_ID=$councilid;
            }
            $selectedcouncil_id= DB::table('councils')
                ->select('councils.id')
                ->where('councils.id','=',$council_ID)
                ->first();
            foreach ($selectedcouncil_id as $r){
                $selectedvaluecouncil_id=$r;
            }
            $roles = DB::table('roles')
                ->select('roles.name')
                ->get();
            $user = User::find($id);
            $userRole = $user->roles->pluck('name','name')->all();
            foreach ($userRole as $r){
                $selectedvalue=$r;
            }
            return view('pages.admin.user.edit',compact('users','roles','selectedvalueregion_id','regions','selectedvaluecouncil_id','councils','selectedvalue'));
        }
        /*admin and projectmanager*/
        else {
            $roles = DB::table('roles')
                ->select('roles.name')
                ->get();
            $user = User::find($id);
            $userRole = $user->roles->pluck('name','name')->all();
            foreach ($userRole as $r){
                $selectedvalue=$r;
            }
            return view('pages.admin.user.edit',compact('users','roles','selectedvalue'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'email' => 'required',
            'phonenumber' => 'required',
            'roles' => 'required'
        ]);
        $user_id=  DB::table('users')
            ->select('users.id')
            ->where('users.id','=',$id)->first();
        foreach ($user_id as $userid) {
            $userdata = User::where('id', '=', $userid)->get();
        }
        foreach ($userdata as $userdatas) {
            $users = $userdatas;
        }
        /*Headmaster*/
        if($users->region_id != null &&  $users->council_id != null && $users->school_id != null){
            $update_user = User::find($users->id);
            /*capture email berore update*/
            $email_before_update= \Illuminate\Support\Facades\DB::table('users')
                ->where('users.id','=',$update_user->id)
                ->select('users.email')
                ->first();
            $update_user->email = $request->get('email');
            $update_user->firstname = $request->get('firstname');
            $update_user->lastname = $request->get('lastname');
            $update_user->phonenumber = $request->get('phonenumber');
            $update_user->region_id = $request->get('region_id');
            $update_user->council_id = $request->get('council_id');
            $update_user->school_id = $request->get('school_id');
            $update_user->update();
            $email_after_update= DB::table('users')->select('users.email')->where('users.id','=',$id)->first();
            if( $email_after_update == $email_before_update){
                echo "";
            }
            else{
                $token= app('auth.password.broker')->createToken($update_user);
                $UserID= $update_user->id;
                DB::table('users')
                    ->select('remember_token')
                    ->where ('id','=',$UserID)
                    ->update(['remember_token' => $token]);
                Mail::send('pages.admin.mailnotification.welcomemailupdate',
                    ['user' => $update_user,'token'=>$token], function ($m) use ($update_user) {
                    $m->to($update_user->email, $update_user->email)->subject( $update_user->email ,'Your account has been changed to  DTLMMS');
                });
            }
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $update_user->assignRole($request->input('roles'));
            return redirect()->route('users.index')->with('success','User updated successfully');
        }
        /*Statistical officer*/
        elseif($users->region_id != null &&  $users->council_id != null && $users->school_id == null){
            $update_user = User::find($users->id);
            /*capture email berore update*/
            $email_before_update= \Illuminate\Support\Facades\DB::table('users')
                ->where('users.id','=',$update_user->id)
                ->select('users.email')
                ->first();
            $update_user->email = $request->get('email');
            $update_user->firstname = $request->get('firstname');
            $update_user->lastname = $request->get('lastname');
            $update_user->phonenumber = $request->get('phonenumber');
            $update_user->region_id = $request->get('region_id');
            $update_user->council_id = $request->get('council_id');
            $update_user->update();
            $email_after_update= DB::table('users')->select('users.email')->where('users.id','=',$id)->first();
            if( $email_after_update == $email_before_update){
                echo "";
            }
            else{
                $token= app('auth.password.broker')->createToken($update_user);
                $UserID= $update_user->id;
                DB::table('users')
                    ->select('remember_token')
                    ->where ('id','=',$UserID)
                    ->update(['remember_token' => $token]);
                Mail::send('pages.admin.mailnotification.welcomemailupdate',
                    ['user' => $update_user,'token'=>$token], function ($m) use ($update_user) {
                        $m->to($update_user->email, $update_user->email)->subject( $update_user->email ,'Your account has been changed to  DTLMMS');
                    });
            }
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $update_user->assignRole($request->input('roles'));
            return redirect()->route('users.index')->with('success','User updated successfully');
        }
        /*admin and project manager*/
        else{
            $update_user = User::find($users->id);
            /*capture email berore update*/
            $email_before_update= \Illuminate\Support\Facades\DB::table('users')
                ->where('users.id','=',$update_user->id)
                ->select('users.email')
                ->first();
            $update_user->email = $request->get('email');
            $update_user->firstname = $request->get('firstname');
            $update_user->lastname = $request->get('lastname');
            $update_user->phonenumber = $request->get('phonenumber');
            $update_user->update();
            $email_after_update= DB::table('users')->select('users.email')->where('users.id','=',$id)->first();
            if( $email_after_update == $email_before_update){
                echo "";
            }
            else{
                $token= app('auth.password.broker')->createToken($update_user);
                $UserID= $update_user->id;
                DB::table('users')
                    ->select('remember_token')
                    ->where ('id','=',$UserID)
                    ->update(['remember_token' => $token]);
                Mail::send('pages.admin.mailnotification.welcomemailupdate',
                    ['user' => $update_user,'token'=>$token], function ($m) use ($update_user) {
                        $m->to($update_user->email, $update_user->email)->subject( $update_user->email ,'Your account has been changed to  DTLMMS');
                    });
            }
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $update_user->assignRole($request->input('roles'));
            return redirect()->route('users.index')->with('success','User updated successfully');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id){

        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','Mtumiaji Amefutwa Kikamilifu');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function userChangeStatus(Request $request){

        $userid= $request->user_id ;

           $dd=DB::table('users')
               ->where('users.id','=',$userid)
               ->select('users.id')
               ->first();
           foreach ($dd as $d){
               $ddd=$d;
           }

//        SELECT * FROM `model_has_roles`
        $role=DB::table('model_has_roles')
            ->select('role_id')
            ->where('model_id','=',$ddd)->first();

        foreach ($role as $roleid){
            $roID=$roleid;
        }
//
        $rolename=DB::table('roles')
            ->select('name')
            ->where('roles.id','=',$roID)->first();
//
        foreach ($rolename as $rolname){
            $rolenamee=$rolname;
        }
//




        if(auth()->user()->hasRole('Admin')){


            if ($rolenamee == "Super-Admin") {

                return back();
//                return back()->with('warning', 'Hakuna ruhusa ya kuhariri Akaunti ya Msimamizi');
            }


            $user = User::find($request->user_id);
            $user->status = $request->status;
            $user->save();
        }


        if(auth()->user()->hasRole('Super-Admin')){
            $user = User::find($request->user_id);
            $user->status = $request->status;
            $user->save();
        }
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
    }
    public function blocked(Request $request){
        $alluser = User::where('status', '=', '1')->paginate(20);
        $logeduser=Auth::user()->id;
        $ministry = DB::table('users')
            ->where('users.id','=',$logeduser)
            ->select('users.ministry_id')
            ->first();
        foreach ($ministry as $ministryID){
        //array :where clause two columns
            $data = User::where(['status' => '1',
                'ministry_id' => $ministryID])
                ->get();
        }
        return view('pages.admin.user.blocked',compact('data','alluser'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }



}
