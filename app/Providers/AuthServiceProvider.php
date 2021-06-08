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
    /*    //create gate
        Gate::define('Create',function($user){
            $permissions=$user->role->permission();

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

        });*/

        //admin user
        Gate::define('Administrator','App\Gates\PostGates@Administrator');

        //Gates For Posts
        Gate::define('CreatesPosts','App\Gates\PostGates@CreatesPosts');
        Gate::define('ReadsPosts','App\Gates\PostGates@ReadsPosts');
        Gate::define('UpdatesPosts','App\Gates\PostGates@UpdatesPosts');
        Gate::define('DeletesPosts','App\Gates\PostGates@DeletesPosts');


        //Gates For Categories
        Gate::define('CreatesCategories','App\Gates\CategoryGates@CreatesCategories');
        Gate::define('ReadsCategories','App\Gates\CategoryGates@ReadsCategories');
        Gate::define('UpdatesCategories','App\Gates\CategoryGates@UpdatesCategories');
        Gate::define('DeletesCategories','App\Gates\CategoryGates@DeletesCategories');


        //Gates For Permissions & Roles
        Gate::define('CreatesRoles','App\Gates\PermissionGates@CreatesRoles');
        Gate::define('ReadsRoles','App\Gates\PermissionGates@ReadsRoles');
        Gate::define('UpdatesRoles','App\Gates\PermissionGates@UpdatesRoles');
        Gate::define('DeletesRoles','App\Gates\PermissionGates@DeletesRoles');

        //Gates For User
        Gate::define('CreatesUsers','App\Gates\UserGates@CreatesUsers');
        Gate::define('ReadsUsers','App\Gates\UserGates@ReadsUsers');
        Gate::define('UpdatesUsers','App\Gates\UserGates@UpdatesUsers');
        Gate::define('DeletesUsers','App\Gates\UserGates@DeletesUsers');

        //Gates For Media
        Gate::define('ReadsMedias','App\Gates\MediaGates@ReadsMedias');
        Gate::define('DeletesMedias','App\Gates\MediaGates@DeletesMedias');



    }
}
