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
        $news =News::getRecentNews(1, 3);

        $landsFirst = Land::getSimilarLandFromCategory(3, 1);
        $landsSecond = Land::getSimilarLandFromCategory(3, 2);
        $landsThird = Land::getSimilarLandFromCategory(3, 4);

        $landCount['belgorod'] = Land::where('region_id', 1)->count();
        $landCount['shbk'] = Land::where('region_id', 2)->count();
        $landCount['stroitel'] = Land::where('region_id', 3)->count();
        $landCount['korocha'] = Land::where('region_id', 4)->count();

        return view('index', compact('lands', 'regions', 'news', 'landCount', 'landsFirst', 'landsSecond', 'landsThird'));
    }

    public function aboutUsPage()
    {
        return view('common/about_us');
    }
}
