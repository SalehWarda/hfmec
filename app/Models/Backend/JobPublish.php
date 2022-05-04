<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class JobPublish extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title','content'];

    protected $guarded=[];
}
