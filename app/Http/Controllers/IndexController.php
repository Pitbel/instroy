<?php

namespace App\Http\Controllers;

use App\Land;
use App\LandRegion;
use App\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $lands = Land::orderBy('created_at', 'DESC')->limit(6)->get();

        #For Filters
        $regions = LandRegion::orderBy('name', 'ASC')->get();

        #latest news
        $news = News::orderBy('created_at', 'DESC')->limit(3)->get();

        return view('index', compact('lands', 'regions', 'news'));
    }
}
