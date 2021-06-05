<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Post'=>'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //create gate
        Gate::define('Create',function($user){
            $permissions=$user->role->permission();
            //dd($permissions);
            foreach ($permissions as $permission){


                if(in_array($permission->name,[

                    'Create',

                ])){
                    return true;

                }

            }

            return false;
        });
       //Update gate
        Gate::define('Update',function($user){
            $permissions=$user->role->permission();
            //dd($permissions);
            foreach ($permissions as $permission){


                if(in_array($permission->name,[

                    'Update',

                ])){
                    return true;

                }

            }

            return false;
        });

        //Delete Gate

        Gate::define('Delete',function($user){
            $permissions=$user->role->permission();
            //dd($permissions);
            foreach ($permissions as $permission){


                if(in_array($permission->name,[

                    'Delete',

                ])){
                    return true;

                }

            }

            return false;
        });

//For Administrator
        Gate::define('Administrator',function($user){
            $permissions=$user->role->permission();
            $userPermissions= count($permissions);

            $PermissionsRecords=Permission::all();

            $AllPermissions=count($PermissionsRecords);

            if($userPermissions==$AllPermissions){

                return true;
            }
            else{
                return false;

            }

        });





    }
}
