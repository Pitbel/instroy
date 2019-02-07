<?php

namespace App\Http\Controllers\Admin;

use App\Land;
use App\LandImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Image;

class LandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lands = Land::orderBy('created_at', 'desc')->get();

        return view('admin.lands', compact('lands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.land-edit', compact('land'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $newLand = Land::create($request->except(['_token', 'images']));

        if ($request->hasFile('images')) {
            $this->validate($request, [
                'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:9048'
            ]);

            $images = $request->file('images');

            foreach ($images as $image) {
                $filename = md5($image->getFileName() . 'instroy') . '.' . $image->getClientOriginalExtension();
                $path = $image->move(base_path('public/images/lands/' . $newLand->id ), $filename);
                File::exists($path) or File::makeDirectory($path, 0777, true, true);
                Image::make($path)
                    ->resize(698, 500)->save($path);

                //add image to DB
                LandImages::create([
                    'land_id' => $newLand->id,
                    'img_link' => 'images/lands/' . $newLand->id . '/' . $filename,
                ]);

                //add image to DB
                LandImages::create([
                    'land_id' => $newLand->id,
                    'img_link' => 'images/lands/' . $newLand->id . '/' . $filename,
                ]);
            }
        }

        return redirect('/admin/lands')->with('success', 'Участок был успешно добавлен');
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
        $land = Land::findOrFail($id);

        return view('admin.land-edit', compact('land'));
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
            Land::updateOrCreate(['id' => $id], $request->except(['_token', 'images']));

            if ($request->hasFile('images')) {
                $this->validate($request, [
                    'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:9048'
                ]);

                $images = $request->file('images');

                //delete old images in DB
                LandImages::where('land_id', $id)->delete();

                //delete folder
                File::deleteDirectory(public_path('images/lands/' . $id));

                foreach ($images as $image) {
                    $filename = md5($image->getFileName() . 'instroy') . '.' . $image->getClientOriginalExtension();

                    $path = $image->move(base_path('public/images/lands/' . $id ), $filename);
                    File::exists($path) or File::makeDirectory($path, 0777, true, true);
                    Image::make($path)
                        ->resize(698, 500)->save($path);

                    //add image to DB
                    LandImages::create([
                        'land_id' => $id,
                        'img_link' => 'images/lands/' . $id . '/' . $filename,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Участок был успешно обновлен');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return redirect()->back()->with('error', 'Произошла ошибка обновления участка');
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
        Land::destroy($id);

        return redirect()->back()->with('success', 'Участок был успешно удален');
    }
}
