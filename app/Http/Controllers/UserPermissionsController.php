<?php

namespace App\Http\Controllers;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Gate;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class UserPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('ReadsRoles');
        $roles=Role::all();
        $permissions=Permission::all();

        return view('admin.permission.index',compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::all();
        $roles=Role::pluck('name','id')->all();
        return view('admin.permission.create',compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Gate::authorize('CreatesRoles');
        $input['name']=$request->title;



        $roles=Role::create($input);
        return redirect('/admin/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Role::findorFail($id);

        $allpermissions=Permission::all();
        return view('admin.permission.edit',compact('roles','allpermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('UpdatesRoles');
        $permissions=$request->mypermissions;
        $ok=json_encode(($permissions),true);
        //echo $ok;
        $thepermission=array('permissions'=>$ok);
        Role::where('id',$id)->update($thepermission);
        return redirect('/admin/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('DeletesRoles');
        Role::destroy($id);
        return redirect('/admin/permissions');
    }
}
