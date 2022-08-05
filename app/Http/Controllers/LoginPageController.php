<?php

namespace App\Http\Controllers;

use App\Models\LoginPage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoginPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $login_page_infos = LoginPage::first();
        return view('admin.loginPage.index', compact('login_page_infos'));
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
     * @param  \App\Models\LoginPage  $loginPage
     * @return \Illuminate\Http\Response
     */
    public function show(LoginPage $loginPage)
    {
       return view('admin.loginPage.show', compact('loginPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoginPage  $loginPage
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginPage $loginPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoginPage  $loginPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoginPage $loginPage)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $loginPage->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        if($request->image)
        {
            $image    = $request->file('image');
            $filename = $loginPage->id . '-' . time(). '.' . $image->extension();
            $location = public_path('uploads/loginPage/');
            $image->move($location, $filename);

            $loginPage->image = $filename;
            $loginPage->save();
        }
        
        return back()->with('success', 'Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoginPage  $loginPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginPage $loginPage)
    {
        //
    }
}
