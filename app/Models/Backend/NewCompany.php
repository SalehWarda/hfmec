<?php

namespace App\Models\Backend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class NewCompany extends Model
{

    use HasFactory, HasTranslations, Sluggable, SearchableTrait;

    public $translatable = ['title','content'];

    protected $guarded=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $searchable = [

        'columns' => [
            'new_companies.name' => 10,

        ],

    ];

    public  function  firstMedia(): MorphOne
    {
        return $this->morphOne(Media::class,'mediable')->orderBy('file_sort','asc');

    }
    public function media(): MorphMany
    {

        return $this->morphMany(Media::class,'mediable');
    }

}
