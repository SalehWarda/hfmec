<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Mail extends Model
{
    use HasFactory,SearchableTrait;

    protected $guarded=[];

    protected $searchable = [

        'columns' => [
            'mails.full_name' => 10,

        ],

    ];
}
