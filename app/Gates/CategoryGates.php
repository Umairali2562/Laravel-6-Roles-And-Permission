<?php
namespace App\Gates;

use App\Permission;
use Illuminate\Support\Facades\Auth;

class CategoryGates{

    public function CreatesCategories(){
        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Create-Categories',

            ])){
                return true;

            }

        }

        return false;
    }

    public function ReadsCategories(){

        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Read-Categories',

            ])){
                return true;

            }

        }

        return false;
    }

    public function UpdatesCategories(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Update-Categories',

            ])){
                return true;

            }

        }

        return false;
    }

    public function DeletesCategories(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Delete-Categories',

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
