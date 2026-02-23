<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

class CompanyProfileController extends Controller
{
    public function page($slug)
    {
        $pages = Page::where('is_active', 1)->orderBy('order')->get();

        return view('front-end.' . $slug . '', compact('pages'));
    }
}
