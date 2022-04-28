<?php

namespace App\Models\Backend\About;

use App\Models\Backend\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Translatable\HasTranslations;

class IsoCertificate extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['iso'];

    protected $guarded=[];


    public  function  firstMedia(): MorphOne
    {
        return $this->morphOne(Media::class,'mediable')->orderBy('file_sort','asc');

    }
    public function media(): MorphMany
    {

        return $this->morphMany(Media::class,'mediable');
    }
}
