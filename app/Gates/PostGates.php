<?php
namespace App\Gates;

use App\Permission;
use Illuminate\Support\Facades\Auth;

class PostGates{

    public function CreatesPosts(){
        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Create-Posts',

            ])){
                return true;

            }

        }

        return false;
    }

    public function ReadsPosts(){

        $permissions=Auth::user()->role->permission();

            foreach ($permissions as $permission){


                if(in_array($permission->name,[

                    'Read-Posts',

                ])){
                    return true;

                }

            }

            return false;
    }

    public function UpdatesPosts(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Update-Posts',

            ])){
                return true;

            }

        }

        return false;
    }

    public function DeletesPosts(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Delete-Posts',

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
