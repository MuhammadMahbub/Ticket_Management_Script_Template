<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_navigation_data = Navigation::all();
        return view('admin.navigation.index', compact('all_navigation_data'));
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
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show(Navigation $navigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Navigation $navigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navigation $navigation)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $navigation->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return redirect()->route('navigation.index')->with('success', 'Navigation updated Successfully');
    }

    public function search_wise_navigation(Request $request){
        if ($request->search_value != null) {
            $all_navigation_data  =  Navigation::where('name','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $all_navigation_data = Navigation::all();
        }

        $count = $all_navigation_data->count();

        $view  = view('includes.navigation.index', compact('all_navigation_data'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    public function date_wise_navigation(Request $request){
        
        $from_date = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $all_navigation_data = Navigation::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $all_navigation_data->count();
        $view = view('includes.navigation.index', compact('all_navigation_data'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_clear_wise_navigation(Request $request){
        $all_navigation_data = Navigation::all();

        $view = view('includes.navigation.index', compact('all_navigation_data'))->render();
        return response()->json(['data' => $view]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */

}
