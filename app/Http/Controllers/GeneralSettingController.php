<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        return view('admin.generalSetting.index', compact('generalSettings'));
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
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        // Form Validation
        $request->validate([
            'logo'   => 'image',
        ]);

         // Site Logo
         if($request->hasFile('logo')){

            $logo                 = $request->file('logo'); 
            $filename             = 'logo.'. $logo->extension();
            $location             = public_path('uploads/generalSetting/'); 

            $logo->move($location, $filename); 

            $generalSetting->logo = $filename; 
            $generalSetting->save();
        }

        return back()->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
