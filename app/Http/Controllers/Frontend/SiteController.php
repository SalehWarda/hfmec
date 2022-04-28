<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        $data['services'] = Service::get();
        return view('pages.frontend.index',$data);

    }
}
