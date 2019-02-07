<?php

namespace App\Http\Controllers;

use App\Land;
use App\LandRegion;
use App\News;
use Illuminate\Http\Request;
use Meta;

class IndexController extends Controller
{
    public function __construct()
    {
        Meta::set('title', '"ООО Инстрой" - продажа земли в Белгороде и Белгородской области');
        Meta::set('description', '"ООО Иистрой" - Недвижимость в Белгороде. Земля под строительство ИЖС, усадьбы, торговых объектов, кооммерческого назначения');
    }

    public function index()
    {
        $lands = Land::orderBy('created_at', 'DESC')->limit(6)->get();

        #For Filters
        $regions = LandRegion::orderBy('name', 'ASC')->get();

        #latest news
        $news = News::orderBy('created_at', 'DESC')->limit(3)->get();

        $landCount['belgorod'] = Land::where('locality_id', 1)->count();
        $landCount['shbk'] = Land::where('locality_id', 3)->count();
        $landCount['stroitel'] = Land::where('locality_id', 5)->count();
        $landCount['korocha'] = Land::where('locality_id', 6)->count();

        return view('index', compact('lands', 'regions', 'news', 'landCount'));
    }

    public function aboutUsPage()
    {
        return view('common/about_us');
    }
}
