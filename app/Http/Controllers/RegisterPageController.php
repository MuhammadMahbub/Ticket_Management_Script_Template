<?php

namespace App\Http\Controllers;

use App\Models\RegisterPage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegisterPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $register_page_infos = RegisterPage::first();
        return view('admin.registerPage.index', compact('register_page_infos'));
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
     * @param  \App\Models\RegisterPage  $registerPage
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterPage $registerPage)
    {
        return view('admin.registerPage.show', compact('registerPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterPage  $registerPage
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterPage $registerPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisterPage  $registerPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterPage $registerPage)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $registerPage->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        if($request->image)
        {
            $image    = $request->file('image');
            $filename = $registerPage->id . '-' . time(). '.' . $image->extension();
            $location = public_path('uploads/registerPage/');
            $image->move($location, $filename);

            $registerPage->image = $filename;
            $registerPage->save();
        }
        
        return back()->with('success', 'Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisterPage  $registerPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterPage $registerPage)
    {
        //
    }
}
