<?php
namespace App\Gates;

use App\Permission;
use Illuminate\Support\Facades\Auth;

class UserGates{

    public function CreatesUsers(){
        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Create-Users',

            ])){
                return true;

            }

        }

        return false;
    }

    public function ReadsUsers(){

        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Read-Users',

            ])){
                return true;

            }

        }

        return false;
    }

    public function UpdatesUsers(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Update-Users',

            ])){
                return true;

            }

        }

        return false;
    }

    public function DeletesUsers(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Delete-Users',

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
