<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller{
    /**
     * Display a listing of the resource.
     *
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','ASC')->paginate(20);
        return view('pages.admin.role.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $permission = Permission::get();
        return view('pages.admin.role.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')
            ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)->get();
        return view('pages.admin.role.show',compact('role','rolePermissions'))->with('i');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('pages.admin.role.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


        $rol=DB::table("roles")->where('id',$id)->select('roles.name')->first();
        foreach ($rol as $ro){
            $cheo=$ro;
        }

        if ($cheo == 'Super-Admin') {
            return back()->with('error', 'No permission to edit Administrator Account');
        }

        $admin=   $request->input('name');
        $role = Role::find($id);
        if ($cheo == 'Admin' || $cheo == 'KM sheria') {
            if($admin=="Admin"  || $admin=="KM sheria"){
                $role->save();
                $role->syncPermissions($request->input('permission'));
                return redirect()->route('roles.index')
                    ->with('success','Cheo kimesahihishwa kikamilifu');
            }
            return back()->with('error', 'No permission to edit Account Name');
        }
        else{
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index')
                ->with('success','Role updated successfully');
        }



       //$role->name = $request->input('name');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */

    /*Hapo mnapodoa nia  nzuri ni kutumia jquery,,rudi kule*/
    public function destroy($id){
        DB::table("roles")
            ->where('name','!=','Super-Admin')
            ->where('id',$id)->delete();
        return redirect()->route('roles.index')
            ->with('success','Role deleted successfully');
    }
}
