<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();

        return view('admin.news.news_list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.news_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $news = News::create([
            'title' => $request->title,
            'short_text' => $request->short_text,
            'full_text' => $request->full_text,
            'img' => '',
        ]);

        if ($request->hasFile('img')) {
            $this->validate($request, [
                'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:9048'
            ]);

            $image = $request->file('img');

            //delete folder
            File::deleteDirectory(public_path('img/news/' . $news->id));

            $filename = md5($image->getFileName() . 'instroy') . '.' . $image->getClientOriginalExtension();

            $path = $image->move(base_path('public/img/news/' . $news->id ), $filename);
            File::exists($path) or File::makeDirectory($path, 0777, true, true);
            Image::make($path)
                ->resize(698, 500)->save($path);

            #upd path
            $path = '/img/news/' . $news->id . '/' . $filename;
            News::where('id', $news->id)->update(['img' => $path]);
        }

        return redirect('/admin/news')->with('success-news', 'Новость "' . $request->title . '" была успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.news_edit', compact('news'));
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
        try {

            if ($request->hasFile('img')) {
                $this->validate($request, [
                    'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:9048'
                ]);

                $image = $request->file('img');

                //delete folder
                File::deleteDirectory(public_path('img/news/' . $id));

                $filename = md5($image->getFileName() . 'instroy') . '.' . $image->getClientOriginalExtension();

                $path = $image->move(base_path('public/img/news/' . $id ), $filename);
                File::exists($path) or File::makeDirectory($path, 0777, true, true);
                Image::make($path)
                    ->resize(698, 500)->save($path);

                #upd path
                $path = '/img/news/' . $id . '/' . $filename;
            } else {
                $path = News::findOrFail($id)->img;
            }

            News::updateOrCreate(['id' => $id], [
                'title' => $request->title,
                'short_text' => $request->short_text,
                'full_text' => $request->full_text,
                'img' => $path,
            ]);

            return redirect()->back()->with('success', 'Новость была успешно обновлена');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return redirect()->back()->with('error', 'Произошла ошибка обновления новости');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);

        return redirect()->back()->with('success-news', 'Новость была успешно удалена');
    }
}
