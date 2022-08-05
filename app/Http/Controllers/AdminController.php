<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Language;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Priority;
use App\Models\Socialite;
use App\Models\Department;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Config;

class AdminController extends Controller
{

    public function admin_dashboard(){
        $tickets                    = Ticket::orderBy('id', 'DESC')->limit(5)->get();
        $status                     = Status::all();
        $priority                   = Priority::all();
        $department                 = Department::all();
        $softDeletedTickets         = Ticket::onlyTrashed()->get();

        // ticket analytics for admin
        $total_ticket               = [];
        $solved_ticket              = [];
        $pending_ticket             = [];
        $opened_ticket              = [];

        for ($i=1; $i <=12 ; $i++) {
            $total_ticket []     = Ticket::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->count();
            $solved_ticket []    = Ticket::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',3)->count();
            $pending_ticket []   = Ticket::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',2)->count();
            $opened_ticket []    = Ticket::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',1)->count();
        }

        // ticket analytics for customer
        $customer_ticket = Ticket::where('customer', Auth::id())->get();

        $customer_total_ticket   = [];
        $customer_solved_ticket  = [];
        $customer_pending_ticket = [];
        $customer_opened_ticket  = [];

        for ($i=1; $i <=12 ; $i++) {
             $customer_total_ticket []   = Ticket::where('customer', Auth::id())->whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->count();

             $customer_solved_ticket []  = Ticket::where('customer', Auth::id())->whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',3)->count();

            $customer_pending_ticket []  = Ticket::where('customer', Auth::id())->whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',2)->count();

            $customer_opened_ticket []   = Ticket::where('customer', Auth::id())->whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',1)->count();
        }



        // ticket analytics for Agent

        $tickets_id = [];

        foreach ($tickets as $ticket) {
            $agent_id = json_decode($ticket->agent_id,true);
            if ($agent_id) {
                if (in_array(Auth::id(),$agent_id)) {
                    $tickets_id[] = $ticket->id;
                }
            }
        }

        $agent_total_ticket   = [];
        $agent_solved_ticket  = [];
        $agent_pending_ticket = [];
        $agent_opened_ticket  = [];

        for ($i=1; $i <=12 ; $i++) {
             $agent_total_ticket []  = Ticket::whereIn('id',$tickets_id)->whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->count();

             $agent_solved_ticket [] = Ticket::whereIn('id',$tickets_id)->whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',3)->count();

            $agent_pending_ticket [] = Ticket::whereIn('id',$tickets_id)->whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',2)->count();

            $agent_opened_ticket []  = Ticket::whereIn('id',$tickets_id)->whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->where('status',1)->count();
        }


        #################### pie chart #################
        // $total_ticket= Ticket::all()->count();
        // $solved_ticket = Ticket::where('status',3)->count();
        // $pending_ticket = Ticket::where('status',2)->count();
        // $opened_ticket = Ticket::where('status',1)->count();

        // $labels = ['Total Ticket', 'Solved Ticket', 'Open Ticket', 'Pending Ticket'];
        // $data = [$total_ticket, $solved_ticket, $opened_ticket, $pending_ticket];
        #################### pie chart #################



        $all_agents = User::where('role_id', 2)->latest()->get();
        $all_customers = User::where('role_id', 3)->get();

        $active_customers = Ticket::distinct()->get('customer');

        $active_tickets = Ticket::whereIn('customer', $active_customers)->where('status', 1)->get();

        return view('layouts.dashboard', compact('all_agents','status', 'priority', 'department', 'tickets','total_ticket', 'solved_ticket','pending_ticket','opened_ticket','softDeletedTickets','customer_total_ticket','customer_solved_ticket','customer_pending_ticket','customer_opened_ticket','agent_total_ticket','agent_solved_ticket','agent_pending_ticket','agent_opened_ticket','all_customers','active_tickets'));
    }

    public function ticket(){
        return view('admin.ticket');
    }

    public function team(){
        return view('admin.team');
    }

    public function user(){
        return view('admin.user');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function google_api_key(){
        return view('admin.google_api_key');
    }

    public function update_api_key(Request $request){
        $request->validate([
            '*'=>'required'
        ]);
        Socialite::find(1)->update([
            'client_id'     => $request->client_id,
            'client_secret' => $request->client_secret,
            'redirect'      => $request->redirect,
        ]);
        return back()->withSuccess('Update Successfully');
    }

    public function lang_edit(){

        $file = resource_path('lang/fr.json');
        $data = json_decode(file_get_contents($file), true);
        return view('admin.lang_edit', compact('data'));
    }
    public function lang_update(Request $request){
        $file = resource_path('lang/fr.json');
        $data = json_decode(file_get_contents($file), true);
        $data[$request->key] = $request->value;

        file_put_contents($file, json_encode($data));
        return back()->with('success', 'Updated Successfully');
    }

    public function get_country(Request $request){
        $c_name = $request->country_name;
        $data = view('admin.country_analytics.index', compact('c_name'))->render();

        return response()->json(['data'=> $data]);
    }

}
