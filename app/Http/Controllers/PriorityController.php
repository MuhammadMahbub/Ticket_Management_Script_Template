<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_priorities = Priority::all();
        return view('admin.priority.index', compact('all_priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.priority.create');
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
            'name'    => 'required|unique:priorities',
        ]);

        Priority::create($request->except('_token') + ['created_at' => Carbon::now()]);

        return redirect()->route('priority.index')->with('success', 'Priority Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show(Priority $priority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit(Priority $priority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Priority $priority)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Priority::find($priority->id)->update([
            'name'       => $request->name,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('priority.index')->withSuccess('Priority Upddated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priority $priority)
    {
        $priorities = Ticket::where('priority', $priority->id)->get();
        
        foreach($priorities as $prio){
            $prio->update([
                'priority' => NULL
            ]);
        }

        $priority->delete();
        return back()->with('danger', 'Priority Deleted Successfully');
    }


    public function search_wise_priority(Request $request){
        if ($request->search_value != null) {
            $all_priorities  =  Priority::where('name','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $all_priorities = Priority::all();
        }

        $count = $all_priorities->count();

        $view  = view('includes.priority.index', compact('all_priorities'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    public function date_wise_priority(Request $request){
        
        $from_date = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $all_priorities = Priority::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $all_priorities->count();
        $view = view('includes.priority.index', compact('all_priorities'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_clear_wise_priority(Request $request){
        $all_priorities = Priority::all();

        $view = view('includes.priority.index', compact('all_priorities'))->render();
        return response()->json(['data' => $view]);
    }

}
