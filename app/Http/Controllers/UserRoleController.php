<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;
use App\Models\UserRole;
use App\Models\Department;
use App\Models\Navigation;
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


    public function search_wise_role(Request $request){
        if ($request->search_value != null) {
            $permission_id         =  Navigation::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $roles                 = UserRole::where('role','LIKE','%' . $request->search_value . '%')->orWhereIn('permission', $permission_id)->limit(5)->get();
        } else {
            $roles = UserRole::all();
        }

        $count = $roles->count();

        $view  = view('includes.user_role.index', compact('roles'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    public function date_wise_user_role(Request $request){
        
        $from_date  = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $roles = UserRole::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $roles->count();
        $view  = view('includes.user_role.index', compact('roles'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_clear_wise_user_role(Request $request){
        $roles = UserRole::all();
        $view = view('includes.user_role.index', compact('roles'))->render();
        return response()->json(['data' => $view]);
    }
}