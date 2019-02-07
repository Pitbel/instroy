<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LandRegion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = LandRegion::orderBy('name', 'asc')->get();

        return view('admin.regions.regions_list', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regions.region_edit');
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
            LandRegion::create($request->except('_token'));

            return redirect('admin/regions')->with('success-region', 'Район был успешно добавлен');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return redirect()->back()->with('error', 'Произошла ошибка добавления района');
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
        $region = LandRegion::findOrFail($id);

        return view('admin.regions.region_edit', compact('region'));
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
            LandRegion::updateOrCreate(['id' => $id], $request->except('_token'));

            return redirect()->back()->with('success', 'Район был успешно обновлен');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return redirect()->back()->with('error', 'Произошла ошибка обновления района');
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
        LandRegion::destroy($id);

        return redirect()->back()->with('success-region', 'Район был успешно удален');
    }
}
