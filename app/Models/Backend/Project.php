<?php

namespace App\Models\Backend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class Project extends Model
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
            'projects.name' => 10,

        ],

    ];

    public function scopeActive($query){

        return $query->whereStatus(true);
    }

    public function scopeActiveService($query){

        return $query->whereHas('service',function ($query){

            $query->whereStatus(1);
        });
    }

    public function status(){

        return $this->status == 1 ? 'مكتمل' : 'تحت العمل';

    }

    public function service(){

        return $this->belongsTo(Service::class,'service_id','id');
    }

    public  function  firstMedia(): MorphOne
    {
        return $this->morphOne(Media::class,'mediable')->orderBy('file_sort','asc');

    }
    public function media(): MorphMany
    {

        return $this->morphMany(Media::class,'mediable');
    }


    public function statusWithLabel()
    {
        switch ($this->status()){

            case 0: $result = '<label class="badge badge-success">مكتمل</label>' ; break;
            case 1: $result = '<label class="badge badge-warning">تحت العمل</label>' ; break;



        }

        return $result;
    }
}
