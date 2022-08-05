<?php

namespace App\Http\Controllers;

use App\Models\ColorSetting;
use Illuminate\Http\Request;

class ColorSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.colorSettings.index', [

            'colorSettings' => colorSetting::first()
        ]);
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
     * @param  \App\Models\ColorSetting  $colorSetting
     * @return \Illuminate\Http\Response
     */
    public function show(ColorSetting $colorSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ColorSetting  $colorSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ColorSetting $colorSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ColorSetting  $colorSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColorSetting $colorSetting)
    {
        // Form Validation
        $request->validate([
            'theme_color'  => 'required',
        ]);

        $colorSetting->theme_color  = $request->theme_color;
        $colorSetting->save();

        return back()->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ColorSetting  $colorSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColorSetting $colorSetting)
    {
        //
    }
}
