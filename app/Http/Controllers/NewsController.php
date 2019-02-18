<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Meta;

class NewsController extends Controller
{
    public function __construct()
    {
        Meta::set('title', 'Новости - продажа земли в Белгороде и Белгородской области');
        Meta::set('description', 'Новости - "ООО Инстрой" - Недвижимость в Белгороде. Земля под строительство ИЖС, усадьбы, торговых объектов, кооммерческого назначения');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::getRecentNews(1, false, null, 9);

        return view('blog.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $recentNews = News::getRecentNews(5);

        Meta::set('title', $news->title. ' - Новости - Недвижимость в Белгороде');

        return view('blog.single', compact('news', 'recentNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
