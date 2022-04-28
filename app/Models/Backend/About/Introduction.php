<?php

namespace App\Models\Backend\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Introduction extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['description'];

    protected $guarded=[];
}
