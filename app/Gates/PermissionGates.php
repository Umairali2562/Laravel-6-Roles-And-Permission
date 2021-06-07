<?php
namespace App\Gates;

use App\Permission;
use Illuminate\Support\Facades\Auth;

class PermissionGates{

    public function CreatesRoles(){
        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Create-Roles',

            ])){
                return true;

            }

        }

        return false;
    }

    public function ReadsRoles(){

        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Read-Roles',

            ])){
                return true;

            }

        }

        return false;
    }

    public function UpdatesRoles(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Update-Roles',

            ])){
                return true;

            }

        }

        return false;
    }

    public function DeletesRoles(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Delete-Roles',

            ])){
                return true;

            }

        }

        return false;
    }

    public function Administrator(){
        $permissions=Auth::user()->role->permission();
        $userPermissions= count($permissions);

        $PermissionsRecords=Permission::all();

        $AllPermissions=count($PermissionsRecords);

        if($userPermissions==$AllPermissions){

            return true;
        }
        else{
            return false;

        }
    }


}
