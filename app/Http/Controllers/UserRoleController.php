<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;
use App\Models\UserRole;
use App\Models\Department;
use App\Models\Ticket_reply;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        return view('admin.user_role.index',[
            'roles' => UserRole::all(),
        ]);
    }

    public function create()
    {
        // return view('admin.user_role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role'                => 'required|unique:user_roles',
            'permission'          => 'required',
        ],[
            'permission.required' => 'Minimum one permission is required!'
        ]);

        UserRole::insert([
            'role'                => $request->role,
            'permission'          => json_encode($request->permission),
            'created_at'          => Carbon::now(),
        ]);

        return redirect()->route('user_role.index')->withSuccess('Role Created successfully');
    }

    public function show(UserRole $userRole)
    {
        $single_role_info = UserRole::find($userRole->id);;

        return view('admin.user_role.show', compact('single_role_info'));
    }

    public function edit(UserRole $userRole)
    {
        //
    }

    public function update(Request $request, UserRole $userRole)
    {
        $request->validate([
            'role'        => 'required',
            'permission'  => 'required',
        ]);
        $userRole->update([
            'role'        => $request->role,
            'permission'  => json_encode($request->permission),
            'created_at'  => Carbon::now(),
        ]);

        $user_permissions = User::where('role_id',$userRole->id)->get();
        foreach($user_permissions as $perm){
            $perm->update([
                'permission'  => json_encode($request->permission),
            ]);
        }

        $userRole->save();

        return redirect()->route('user_role.index')->withSuccess('Role Updated successfully');
    }

    public function destroy(UserRole $userRole)
    {
       $users = User::where('role_id', $userRole->id)->get();

       foreach($users as $user){
            $user->update([
                'role_id' => NULL
            ]);
            
            $userRole->delete();
            return redirect()->route('user_role.index')->withDanger('Role Deleted Successfully');
        }
    }
}