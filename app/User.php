<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  /*  protected $fillable = [
        'name', 'email', 'password', 'role_id' , 'is_active','photo_id'
    ];*/
    protected $guarded=[''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){

        return $this->belongsto('App\Role');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin()
    {

        $permissions=Auth::user()->role->permission();

        foreach ($permissions as $permission){

            if(in_array($permission->name,[
                    'Create-Roles',
                    'Read-Roles',
                    'Update-Roles',
                    'Delete-Roles',
                    'Create-Users',
                    'Read-Users',
                    'Update-Users',
                    'Delete-Users',
                    'Create-Posts',
                    'Read-Posts',
                    'Update-Posts',
                    'Delete-Posts',
                    'Create-Categories',
                    'Read-Categories',
                    'Update-Categories',
                    'Delete-Categories',
                    'Read-Medias',
                    'Delete-Categories',

                ]) && $this->is_active==1){
                return true;

            }else{
                return false;
            }

        }

    }

    public function posts(){
        return $this->hasMany('App\Post','user_id');
    }
}
