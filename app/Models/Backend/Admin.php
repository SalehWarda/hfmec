<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class Admin extends  Authenticatable
{
    use HasFactory,SearchableTrait,HasTranslations,Notifiable;

    protected $guarded=[];
    public $translatable = ['name'];


    protected $searchable = [

        'columns' => [
            'admins.first_name' => 10,
            'admins.last_name' => 10,
            'admins.email' => 10,
            'admins.mobile' => 10,

        ],

    ];

    public function role(){

        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function hasAbility($permissions)    //products  //mahoud -> admin can't see brands
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }

        foreach ($role->permissions as $permission) {
            if (is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } else if (is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }
        return false;
    }


}
