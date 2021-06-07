<?php
namespace App\Gates;

use App\Permission;
use Illuminate\Support\Facades\Auth;

class MediaGates{



    public function ReadsMedias(){

        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Read-Medias',

            ])){
                return true;

            }

        }

        return false;
    }



    public function DeletesMedias(){
        $permissions=Auth::user()->role->permission();
        //dd($permissions);
        foreach ($permissions as $permission){


            if(in_array($permission->name,[

                'Delete-Medias',

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
