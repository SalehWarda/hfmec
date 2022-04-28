<?php

namespace App\Models\Backend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations, Sluggable, SearchableTrait;


    public $translatable = ['name','description'];

    protected $guarded=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $searchable = [

        'columns' => [
            'services.name' => 10,

        ],

    ];

    public function projects(){

        return $this->hasMany(Project::class);
    }

    public function status(){

        return $this->status == 1 ? 'Active' : 'Inactive';

    }

}
