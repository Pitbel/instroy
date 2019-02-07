<?php

namespace App\Http\Controllers\Admin;

use App\LandLocality;
use App\LandRegion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localities = LandLocality::orderBy('name', 'asc')->get();

        return view('admin.localities.localities_list', compact('localities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = LandRegion::orderBy('name', 'asc')->get();

        return view('admin.localities.locality_edit', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            LandLocality::create($request->except('_token'));

            return redirect('admin/localities')->with('success-locality', 'Населенный пункт был успешно добавлен');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return redirect()->back()->with('error', 'Произошла ошибка добавления населенного пункта');
        }
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
        $regions = LandRegion::orderBy('name', 'asc')->get();
        $locality = LandLocality::findOrFail($id);

        return view('admin.localities.locality_edit', compact('locality', 'regions'));
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
            LandLocality::updateOrCreate(['id' => $id], $request->except('_token'));

            return redirect()->back()->with('success', 'Населенный пункт был успешно обновлен');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return redirect()->back()->with('error', 'Произошла ошибка обновления населенного пункта');
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
        LandLocality::destroy($id);

        return redirect()->back()->with('success-locality', 'Населенный пункт был успешно удален');
    }
}
