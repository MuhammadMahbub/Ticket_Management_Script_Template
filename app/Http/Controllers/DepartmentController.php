<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments    = Department::all();
        $roles          = UserRole::all();
        $users          = User::where('role_id', 2)->get();
        return view('admin.department.index', compact('departments','roles', 'users'));
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
        // return $request->user_id;
        $request->validate([
            'name' => 'required',
        ]);

        if ($request->user_id) {
            Department::insert([
                'name'       => $request->name,
                'role_id'    => $request->role_id,
                'user_id'    => json_encode($request->user_id),
                'created_at' => Carbon::now(),

            ]);
        }else{
            Department::insert([
                'name'       =>$request->name,
                'role_id'    => $request->role_id,
                'created_at' => Carbon::now(),
            ]);
        }
         

        return redirect()->route('department.index')->withSuccess('Department Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('admin.department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $department->name        = $request->name;
        $department->role_id     = $request->role_id;

        if ($request->user_id) {
            $department->user_id = json_encode($request->user_id);
        }

        $department->save();
        return redirect()->route('department.index')->withSuccess('Department Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $ticket = Ticket::where('department', $department->id)->get();
        foreach($ticket as $tic){
            $tic->update([
                'department' => NULL,
            ]);
        }
        $department->delete();
        return back()->with('danger', 'Department Deleted Successfully!');
    }

    public function edit_dapartment(Request $request)
    {
        $show_users = User::where('role_id', $request->role_id)->get(['id', 'name']);

        $view       = view('includes.user_drop', compact('show_users'));
        $data       = $view->render();
        return response()->json(['data' => $data]);

    }

}
