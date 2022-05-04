<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasFactory,SearchableTrait,HasTranslations;

    protected $guarded=[];
    public $translatable = ['name'];

    protected $searchable = [

        'columns' => [
            'roles.name' => 10,

        ],

    ];

    public function admins(){

        return $this->hasMany(Admin::class);
    }


    public function getPermissionsAttribute($permissions)
    {
        return json_decode($permissions, true);
    }
}
