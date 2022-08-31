<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('admin.status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        // if($request->name['fr'] == ''){
        //     return back()->with('success' , "Name in french is required");
        // }
        
        Status::create($request->except('_token') + ['created_at' => Carbon::now()]);
        return redirect()->route('status.index')->withSuccess('Status Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'name'    => 'required'
        ]);

        $status->name = $request->name;
        $status->save();
        return redirect()->route('status.index')->withSuccess('Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $statuses = Ticket::where('status', $status->id)->get();
        foreach($statuses as $stat){
            $stat->update([
                'status'=> NULL
            ]);
        }
        $status->delete();
        return back()->with('danger', 'Status Deleted Successfully!');
    }

    public function search_wise_status(Request $request){
        if ($request->search_value != null) {
            $statuses  =  Status::where('name','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $statuses = Status::all();
        }

        $count = $statuses->count();

        $view  = view('includes.status.index', compact('statuses'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    public function date_wise_status(Request $request){
        
        $from_date = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $statuses = Status::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $statuses->count();
        $view = view('includes.status.index', compact('statuses'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_clear_wise_status(Request $request){
        $statuses = Status::all();

        $view = view('includes.status.index', compact('statuses'))->render();
        return response()->json(['data' => $view]);
    }
}
