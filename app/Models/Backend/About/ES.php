<?php

namespace App\Models\Backend\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ES extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['es'];

    protected $guarded=[];
}
