<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Priority;
use App\Models\UserRole;
use App\Models\Department;
use App\Mail\AgentMailSend;
use App\Models\Notification;
use App\Models\Ticket_reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $softDeletedTickets = Ticket::onlyTrashed()->get();
        $all_agents = User::where('role_id', 2)->latest()->get();
        return view('admin.ticket.index',[
            'tickets'                     => Ticket::orderBy('id', 'DESC')->limit(5)->get(),
            'count_admin_create_tickets'  => Ticket::where('creator', 1)->count(),
            'status'                      => Status::orderBy('id','ASC')->get(),
            'priority'                    => Priority::all(),
            'roles'                       => UserRole::all(),
            'department'                  => Department::all(),
            'users'                       => User::all(),
            'softDeletedTickets'          => $softDeletedTickets,
            'all_agents'                  => $all_agents,
        ]);
    }

    public function soft_deleted_tickets()
    {
        $softDeletedTickets = Ticket::onlyTrashed()->get();
        return view('admin.ticket.deleted_ticket',[
        'tickets'                         => Ticket::orderBy('id', 'DESC')->get(),
        'count_admin_create_tickets'      => Ticket::where('creator', 1)->count(),
        'status'                          => Status::orderBy('id','ASC')->get(),
        'priority'                        => Priority::all(),
        'roles'                           => UserRole::all(),
        'department'                      => Department::all(),
        'users'                           => User::all(),
        'softDeletedTickets'              => $softDeletedTickets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ticket_restore($id)
    {

        Ticket::onlyTrashed()->find($id)->restore();
        // Ticket::withTrashed()->find($id)->restore();

        Notification::insert([
            'user_id'     => Auth::id(),
            'role_id'     => Auth::user()->role_id,
            'ticket_id'   => $id,
            'notify_body' => "has restore a ticket, whose ticket id is ". '"#' . $id . '"'. " " . "on",
            'read_status' => 0,
            'route'       => "ticket.index",
            'created_at'  => Carbon::now()
        ]);

        return redirect()->route('ticket.index')->withSuccess('Ticket Restored Successfully');
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
            'select_role'       => 'required',
            'name'              => 'required',
            'subject'           => 'required',
            'department'        => 'required',
            'ticket_body'       => 'required',
        ]);
        Ticket::insert([
            'customer'          =>$request->name,
            'subject'           => $request->subject,
            'department'        => $request->department,
            'status'            => $request->status,
            'priority'          => $request->priority,
            'ticket_body'       => $request->ticket_body,
            'creator'           => 1,
            'agent_id'          => json_encode($request->agent_id),
            'created_at'        => Carbon::now()
        ]);

        return redirect()->route('admin_create_ticket.show')->withSuccess('Ticket Created Successfully');
    }



    //create customer ticket method
    public function customer_ticket(Request $request)
    {
        $request->validate([
            'subject'      => 'required',
            'ticket_body'  => 'required',
        ]);


        $ticket_id = Ticket::insertGetId([
            'subject'      => $request->subject,
            'ticket_body'  => $request->ticket_body,
            'customer'     => Auth::id(),
            'creator'      => 3,
            'created_at'   => Carbon::now()
        ]);

        Notification::insert([
            'user_id'      => Auth::id(),
            'role_id'      => Auth::user()->role_id,
            'ticket_id'    => $ticket_id,
            'notify_body'  => "has created a new ticket, whose ticket id is ". '"#' . $ticket_id. '"' . " " . "on",
            'route'        => "ticket.index",
            'read_status'  => 0,
            'created_at'   => Carbon::now()
        ]);

        return redirect()->route('ticket.index')->withSuccess('Ticket Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('admin.ticket.admin_ticket_show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {

        $request->validate([
            'expire_date'  => 'date|after:today'
        ]);

        if ($request->agent_id) {
            $ticket->update([
                'agent_id' => json_encode($request->agent_id),
            ]);
        }

        $ticket->update([
            'status'      => $request->status,
            'priority'    => $request->priority,
            'department'  => $request->department,
            'expire_date' => $request->expire_date,
        ]);

        
        

        if ($request->agent_id) {
            foreach ($request->agent_id as $single_agent_id) {
                Notification::insert([
                    'user_id'     => Auth::id(),
                    'role_id'     => Auth::user()->role_id,
                    'assign_id'   => $single_agent_id,
                    'ticket_id'   => $ticket->id,
                    'notify_body' => "has assign this ticket, whose ticket id is ". '"#' . $ticket->id . '"'. " " . "on",
                    'read_status' => 0,
                    'route'       => "ticket.index",
                    'created_at'  => Carbon::now()
                ]);
            } 
        }

        Notification::insert([
            'user_id'     => Auth::id(),
            'role_id'     => Auth::user()->role_id,
            'customer_id' => $request->customer_id,
            'ticket_id'   => $ticket->id,
            'notify_body' => "Updated this ticket, whose ticket id is ". '"#' . $ticket->id . '"'. " " . "on",
            'read_status' => 0,
            'route'       => "ticket.index",
            'created_at'  => Carbon::now()
        ]);

        return back()->with('success','Ticket Upddated Successfully');
    }


    public function admin_ticket_update(Request $request, $id){
        $request->validate([
            'subject'     => 'required',
            'ticket_body' => 'required',
        ]);

        $ticket = Ticket::find($id);

        $ticket->update($request->except('_token') + ['updated_at' => Carbon::now(), 'agent_id' => json_encode($request->agent_id)]);

        return redirect()->route('admin_create_ticket.show')->withSuccess('Ticket Upddated Successfully');
    }

    public function customer_ticket_update(Request $request, $id){
        $request->validate([
            'subject'     => 'required',
            'ticket_body' => 'required',
        ]);

        Ticket::find($id)->update([
            'subject'     => $request->subject,
            'department'  => $request->department,
            'ticket_body' => $request->ticket_body,
        ]);

        Notification::insert([
            'user_id'     => Auth::id(),
            'role_id'     => Auth::user()->role_id,
            'ticket_id'   => $id,
            'notify_body' => "has updated a ticket, whose ticket id is ". '"#' . $id . '"'. " " . "on",
            'read_status' => 0,
            'route'       => 'ticket.index',
            'created_at'  => Carbon::now()
        ]);

        return redirect()->route('ticket.index')->withSuccess('Ticket Upddated Successfully');
    }

    public function agent_ticket_update(Request $request, $id)
    {
        Ticket::find($id)->update([
            'status' => $request->status,
        ]);

        Notification::insert([
            'user_id'     => Auth::id(),
            'role_id'     => Auth::user()->role_id,
            'customer_id' => $request->customer_id,
            'ticket_id'   => $id,
            'notify_body' => "has updated a ticket, whose ticket id is ". '"#' . $id . '"'. " " . "on",
            'read_status' => 0,
            'route'       => 'ticket.index',
            'created_at'  => Carbon::now()
        ]);

        return redirect()->route('ticket.index')->with('success','Ticket Upddated Successfully');
    }

    public function customer_ticket_delete(Request $request, $id)
    {   
        Notification::insert([
            'user_id'     => Auth::id(),
            'role_id'     => Auth::user()->role_id,
            'ticket_id'   => $id,
            'notify_body' => "has deleted a ticket, whose ticket id is ". '"#' . $id . '"' . " " . "on",
            'read_status' => 0,
            'route'       => 'soft_deleted_tickets',
            'created_at'  => Carbon::now()
        ]);

        Ticket::find($id)->delete();

        return redirect()->route('ticket.index')->withDanger('Ticket Deletes Successfully');
    }

    public function customer_ticket_show($id)
    {
        $single_ticket_details = Ticket::find($id);

        return view('admin.ticket.show', compact('single_ticket_details'));
    }

    public function permanent_delete($id)
    {
        $ticket = Ticket::find($id);

        $ticket_id = Ticket_reply::where('ticket_id', $id)->get();
        foreach($ticket_id as $tic){
            $tic->update([
                'ticket_id'=> NULL
            ]);
        }

        $ticket->forceDelete();

        return redirect()->route('ticket.index')->withDanger('Ticket Deleted Successfully');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('ticket.index')->withDanger('Ticket Deleted Successfully');
    }


    public function get_users(Request $request)
    {
        $show_users = User::where('role_id', $request->role_id)->get(['id', 'name']);

        $view = view('includes.user_dropdown', compact('show_users'));
        $data = $view->render();
        return response()->json(['data' => $data]);
    }

    public function edit_users(Request $request)
    {
        $show_users = User::where('role_id', $request->role_id)->get(['id', 'name']);

        $view = view('includes.user_drop', compact('show_users'));
        $data = $view->render();
        return response()->json(['data' => $data]);
    }

    public function get_agents(Request $request)
    {
        $agents_array = json_decode(Department::find($request->dept_id)->user_id);

        $agents       = User::findMany($agents_array);

        $view         = view('includes.agent_dropdown', compact('agents'));
        $data         = $view->render();
        return response()->json(['data' => $data]);
    }

    public function get_message(Request $request)
    {

        Ticket_reply::insert([
                'ticket_id'   => $request->ticket_id,
                'user_id'     => Auth::id(),
                'reply'       => $request->reply_message,
                'created_at'  => Carbon::now()
        ]);

        Notification::insert([
            'user_id'         => Auth::id(),
            'role_id'         => Auth::user()->role_id,
            'ticket_id'       => $request->ticket_id,
            'notify_body'     => "gave a reply of ticket id is ". '"#' . $request->ticket_id . '"' . " " . "on",
            'read_status'     => 0,
            'route'           => 'ticket.reply',
            'created_at'      => Carbon::now()
        ]);

        return response('success');
    }
    
    public function getMessageRender(Request $request)
    {
        
        $all_reply_individual_tickets = Ticket_reply::where('ticket_id', $request->ticket_id)->orderBy('id', 'ASC')->get();

        $view = view('includes.get_message_dropdown', compact('all_reply_individual_tickets'));
        $data = $view->render();

        return response()->json(['data' => $data]);
    }


    // Admin notification area 
    public function getRenderNotification(){

        $admin_notifications      = Notification::where('role_id', '!=', 1)->where('read_status', 0)->latest()->get();
        $admin_notification_count = Notification::where('role_id', '!=', 1)->where('read_status', 0)->count();

        $data = view('layouts.notification', compact('admin_notifications', 'admin_notification_count'))->render();
        return response()->json(['data' => $data, 'admin_notification_count' => $admin_notification_count]);
    }

    // Agent notification area 
    public function getAgentRenderNotification(){
        
        $all_notifications = Notification::all();

        $notification_id = [];
        foreach ($all_notifications as $notification) {
            if (Auth::id() == $notification->assign_id) {
                $notification_id[] = $notification->id;
            }
        }
                    
        $agent_notification_count = Notification::whereIn('id', $notification_id)->where('read_status', 0)->count();
        $agent_notifications      = Notification::whereIn('id', $notification_id)->where('read_status', 0)->get();
        
        
        $data = view('layouts.agent_notification', compact('agent_notifications', 'agent_notification_count'))->render();
        return response()->json(['data' => $data, 'agent_notification_count' => $agent_notification_count]);
    }


    // Customer notification area 
    public function getCustomerRenderNotification(){
        $all_notifications = Notification::all();

        $notification_id = [];
        foreach ($all_notifications as $notification) {
            if (Auth::id() == $notification->customer_id) {
                $notification_id[] = $notification->id;
            }
        }

        $customer_notification_count = Notification::whereIn('id', $notification_id)->where('read_status', 0)->count();
        $customer_notifications      = Notification::whereIn('id', $notification_id)->where('read_status', 0)->get();

        $data = view('layouts.customer_notification', compact('customer_notifications', 'customer_notification_count'))->render();
        return response()->json(['data' => $data, 'customer_notification_count' => $customer_notification_count]);
    }
                
    // view admin notification page area 
    public function renderViewAllNotification(){

        $all_notifications = Notification::where('role_id', '!=', 1)->latest()->get();
        $data              = view('admin.notification.index', compact('all_notifications'))->render();
        return response()->json(['data' => $data]);
    }

    public function mark_as_read(Request $request){
        Notification::find($request->notification_id)->update([
            'read_status' => 1,
        ]);
    }

    public function mark_as_read_redirect($notification_id){
        Notification::find($notification_id)->update([
            'read_status' => 1,
        ]);

        return back()->with('success', 'status update successfully!');
    }

    public function notification_unread($notification_id){
        Notification::find($notification_id)->update([
            'read_status' => 1,
        ]);
        return redirect()->route('ticket.index');
    }

    public function notification_destroy($notification_id){
        Notification::find($notification_id)->delete();
        return back()->with('success', 'Notification remove successfully!');
    }



    public function mark_as_unread($notification_id){
        Notification::find($notification_id)->update([
            'read_status' => 0,
        ]);
        return back()->with('success', 'status update successfully!');
    }

    public function mark_admin_notification(){

        // Notification::where('role_id', '!=', 1)->where('read_status', 0)->update([
        //     'read_status' => 1,
        // ]);
        return redirect()->route('notification.index');
    }

    public function mark_agent_notification(){

        $all_notifications = Notification::all();
        $notification_id   = [];
        foreach ($all_notifications as $notification) {
            if (Auth::id() == $notification->assign_id) {
                $notification_id[] = $notification->id;
            }
        }

        Notification::whereIn('id', $notification_id)->where('read_status', 0)->update([
            'read_status' => 1,
        ]);

        return redirect()->route('agent_notification.index');
    }

    public function mark_customer_notification(){

        $all_notifications = Notification::all();
        $notification_id   = [];
        foreach ($all_notifications as $notification) {
            if (Auth::id() == $notification->customer_id) {
                $notification_id[] = $notification->id;
            }
        }

        Notification::whereIn('id', $notification_id)->where('read_status', 0)->update([
            'read_status' => 1,
        ]);

        return redirect()->route('customer_notification.index');
    }

    public function view_all_notification(){
        $all_notifications = Notification::where('role_id', '!=', 1)->latest()->get();
        return view('admin.notification.index', compact('all_notifications'));
    }

    public function view_agent_notification(){

        $all_notifications = Notification::all();

        $notification_id = [];
        foreach ($all_notifications as $notification) {
            if (Auth::id() == $notification->assign_id) {
                $notification_id[] = $notification->id;
            }
        }

        $agent_notification_count = Notification::whereIn('id', $notification_id)->count();
        $agent_notifications      = Notification::whereIn('id', $notification_id)->get();
        return view('admin.agent_notification.index', compact('agent_notifications', 'agent_notification_count'));
    }

    public function view_customer_notification(){

        $all_notifications = Notification::all();

        $notification_id   = [];
        foreach ($all_notifications as $notification) {
            if (Auth::id() == $notification->customer_id) {
                $notification_id[] = $notification->id;
            }
        }

        $customer_notification_count = Notification::whereIn('id', $notification_id)->count();
        $customer_notifications      = Notification::whereIn('id', $notification_id)->get();
        return view('admin.customer_notification.index', compact('customer_notifications', 'customer_notification_count'));
    }

    public function ticket_reply($id)
    {
        $all_reply_individual_tickets = Ticket_reply::where('ticket_id', $id)->orderBy('id', 'ASC')->get(); // also use latest()
        $single_ticket_info           = Ticket::find($id);
        $status                       = Status::all();
        $priority                     = Priority::all();
        return view('admin.ticket.reply', compact('id','all_reply_individual_tickets', 'status', 'single_ticket_info', 'priority'));
    }

    public function ticket_reply_store(Request $request){
        $request->validate([
            'reply'=>'required',
        ],[
            'reply.required'=>'Please Reply Something'
        ]);

        if($request->reply){
            Ticket_reply::insert([
                'ticket_id'   => $request->ticket_id,
                'user_id'     => Auth::id(),
                'reply'       => $request->reply,
                'created_at'  => Carbon::now()
            ]);
        }

        return back()->with('success', 'Replay Success');
    }

    // start here
    function admin_create_ticket_show(){
        $tickets                      = Ticket::orderBy('id', 'DESC')->limit(5)->get();
        $count_admin_create_tickets   = Ticket::where('creator', 1)->count();
        $roles                        = UserRole::all();
        $status                       = Status::orderBy('id','ASC')->get();
        $department                   = Department::all();
        $priority                     = Priority::all();
        return view('admin.ticket.admin_create_ticket', compact('tickets', 'roles', 'status', 'department', 'priority', 'count_admin_create_tickets'));
    }

    public function individual_ticket_show($status_id){
        $all_agents                   = User::where('role_id', 2)->latest()->get();
        $softDeletedTickets           = Ticket::onlyTrashed()->get();
        $tickets                      = Ticket::where('status', $status_id)->orderBy('id', 'DESC')->limit(5)->get();
        $status                       = Status::all();
        $count_admin_create_tickets   = Ticket::where('creator', 1)->count();
        $all_tickets                  = Ticket::orderBy('id', 'DESC')->get();
        $priority                     = Priority::all();
        $department                   = Department::all();
        $roles                        = UserRole::all();

        $status_info = Status::find($status_id);

        return view('admin.ticket.individual_ticket_show', compact('tickets', 'softDeletedTickets', 'status', 'count_admin_create_tickets', 'all_tickets','priority','department', 'status_info', 'roles', 'all_agents','status_id'));
    }

    public function all_tickets_show(){

        $status                       = Status::all();
        $count_admin_create_tickets   = Ticket::where('creator', 1)->count();
        $tickets                      = Ticket::orderBy('id', 'DESC')->get();
        $priority                     = Priority::all();
        $department                   = Department::all();
        $roles                        = UserRole::all();

        return view('admin.ticket.all_tickets_show', compact('status', 'count_admin_create_tickets', 'tickets','priority','department','roles'));
    }


    // date wise tickets
    public function date_wise_tickets(Request $request){
        
        $from_date = Carbon::parse($request->from_date);

        $to_date    = Carbon::parse($request->to_date)->addDay();

        $tickets = Ticket::whereBetween('created_at', [$from_date, $to_date])->limit(5)->get();
        
        $count = $tickets->count();

        $status                 = Status::orderBy('id','ASC')->get();
        $priority               = Priority::all();
        $roles                  = UserRole::all();
        $department             = Department::all();

        $view  = view('includes.tickets.index', compact('tickets','status','priority','roles','department'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    // individual date wise tickets
    public function individual_date_wise_tickets(Request $request){
        
        $from_date  = Carbon::parse($request->from_date);

        $to_date    = Carbon::parse($request->to_date)->addDay();

        $tickets    = Ticket::where('status', $request->stat_id)->whereBetween('created_at', [$from_date, $to_date])->limit(5)->get();
        
        $count = $tickets->count();

        $status                 = Status::orderBy('id','ASC')->get();
        $priority               = Priority::all();
        $roles                  = UserRole::all();
        $department             = Department::all();

        $view  = view('includes.tickets.index', compact('tickets','status','priority','roles','department'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    // date clear wise tickets
    public function date_clear_wise_tickets(Request $request){
        
        $tickets = Ticket::orderBy('id', 'DESC')->limit(5)->get();
        
        $status                 = Status::orderBy('id','ASC')->get();
        $priority               = Priority::all();
        $roles                  = UserRole::all();
        $department             = Department::all();

        $view  = view('includes.tickets.index', compact('tickets','status','priority','roles','department'))->render();
        return response()->json(['data' => $view]);
    }

    // agent clear wise tickets
    public function agent_clear_wise_tickets(Request $request){
        
        $tickets = Ticket::orderBy('id', 'DESC')->limit(5)->get();
        
        $status                 = Status::orderBy('id','ASC')->get();
        $priority               = Priority::all();
        $roles                  = UserRole::all();
        $department             = Department::all();

        $view  = view('includes.tickets.index', compact('tickets','status','priority','roles','department'))->render();
        return response()->json(['data' => $view]);
    }

    // agent wise tickets
    public function agent_wise_tickets(Request $request){
        
        $tickets = Ticket::whereJsonContains('agent_id', $request->agents_id)->limit(5)->get();
        
        $count = $tickets->count();

        $status                 = Status::orderBy('id','ASC')->get();
        $priority               = Priority::all();
        $roles                  = UserRole::all();
        $department             = Department::all();

        $view  = view('includes.tickets.index', compact('tickets','status','priority','roles','department'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    // individual agent wise tickets
    public function individual_agent_wise_tickets(Request $request){
        
        $tickets = Ticket::where('status', $request->stat_id)->whereJsonContains('agent_id', $request->agents_id)->limit(5)->get();
        
        $count = $tickets->count();

        $status                 = Status::orderBy('id','ASC')->get();
        $priority               = Priority::all();
        $roles                  = UserRole::all();
        $department             = Department::all();

        $view  = view('includes.tickets.index', compact('tickets','status','priority','roles','department'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    // search tickets
    public function search_wise_tickets(Request $request){
        if ($request->search_value != null) {
            $user_id         =  User::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $department_id   = Department::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $status_id       = Status::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $priority_id     = Priority::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            // $agent_id        = json_encode(User::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id'));

            $tickets         = Ticket::where('id','LIKE','%' . $request->search_value . '%')->limit(5)->orWhereIn('customer', $user_id)->orWhereIn('department', $department_id)->orWhere('subject', 'LIKE','%' . $request->search_value . '%')->orWhereIn('status', $status_id)->orWhereIn('priority', $priority_id)->get();
            // ->orWhere('created_at', 'LIKE','%' . Carbon::parse($request->search_value)->format('Y-m-d') . '%')
        } else {
            $tickets = Ticket::orderBy('id', 'DESC')->limit(5)->get();
        }

        $status                 = Status::orderBy('id','ASC')->get();
        $priority               = Priority::all();
        $roles                  = UserRole::all();
        $department             = Department::all();

        $count = $tickets->count();

        $view  = view('includes.tickets.index', compact('tickets','status','priority','roles','department'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    // individual search wise tickets
    public function individual_search_wise_tickets(Request $request){
        if ($request->search_value != null) {
            // $status_wise_tickets   = Ticket::where('status', $request->stat_id)->get();
            $user_id         =  User::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $department_id   = Department::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $status_id       = Status::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $priority_id     = Priority::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');

            $tickets         = Ticket::where('status', $request->stat_id)->where('id','LIKE','%' . $request->search_value . '%')->limit(5)->get();
           
            $mycount = $tickets->count();
       
            if($mycount == 0)
            {
                $tickets = Ticket::where('status', $request->stat_id)->where('subject','LIKE','%' . $request->search_value . '%')->limit(5)->get();
            }

            $mycount2 = $tickets->count();

            if($mycount2 == 0)
            {
                $tickets = Ticket::where('status', $request->stat_id)->whereIn('department', $department_id)->limit(5)->get();
            }

            $mycount3 = $tickets->count();

            if($mycount3 == 0)
            {
                $tickets = Ticket::where('status', $request->stat_id)->whereIn('priority', $priority_id)->limit(5)->get();
            }

            $mycount4 = $tickets->count();

            if($mycount4 == 0)
            {
                $tickets = Ticket::where('status', $request->stat_id)->whereIn('customer', $user_id)->limit(5)->get();
            }

        } else {
            $tickets    = Ticket::where('status', $request->stat_id)->limit(5)->get();
        }

        $status                 = Status::orderBy('id','ASC')->get();
        $priority               = Priority::all();
        $roles                  = UserRole::all();
        $department             = Department::all();

        $count = $tickets->count();

        $view  = view('includes.tickets.index', compact('tickets','status','priority','roles','department'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }


    public function tickets_load_more(Request $request){

        if ($request->search_value) {

            $user_id         =  User::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $department_id   = Department::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $status_id       = Status::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $priority_id     = Priority::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');

            $tickets   = Ticket::where('id','LIKE','%' . $request->search_value . '%')->orWhereIn('customer', $user_id)->orWhereIn('department', $department_id)->orWhere('subject', 'LIKE','%' . $request->search_value . '%')->orWhereIn('status', $status_id)->orWhereIn('priority', $priority_id)->skip($request->count)->take(5)->get();
            

            $status                 = Status::orderBy('id','ASC')->get();
            $priority               = Priority::all();
            $roles                  = UserRole::all();
            $department             = Department::all();

            $view = view('includes.tickets.index',compact('tickets', 'status', 'priority', 'roles', 'department'));
    
            $data = $view->render();
            $count = $request->count + 5;
            $ticket_count = $tickets->count();
    
            
            return response()->json(['data'=>$data, 'count'=> $count,'ticket_count'=>$ticket_count]);
        }

        if ($request->from_date) {

            $from_date = Carbon::parse($request->from_date);
            $to_date    = Carbon::parse($request->to_date)->addDay();

            $user_id         =  User::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $department_id   = Department::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $status_id       = Status::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $priority_id     = Priority::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');

            $tickets   = Ticket::whereBetween('created_at', [$from_date, $to_date])->skip($request->count)->take(5)->get();
            
            $status                 = Status::orderBy('id','ASC')->get();
            $priority               = Priority::all();
            $roles                  = UserRole::all();
            $department             = Department::all();

            $view = view('includes.tickets.index',compact('tickets', 'status', 'priority', 'roles', 'department'));
    
            $data = $view->render();
            $count = $request->count + 5;
            $ticket_count = $tickets->count();
    
            return response()->json(['data'=>$data, 'count'=> $count,'ticket_count'=>$ticket_count]);
        }

        if ($request->agents_id) {

            $user_id         =  User::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $department_id   = Department::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $status_id       = Status::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $priority_id     = Priority::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');

            $tickets   = Ticket::whereJsonContains('agent_id', $request->agents_id)->skip($request->count)->take(5)->get();
            
            $status                 = Status::orderBy('id','ASC')->get();
            $priority               = Priority::all();
            $roles                  = UserRole::all();
            $department             = Department::all();

            $view = view('includes.tickets.index',compact('tickets', 'status', 'priority', 'roles', 'department'));
    
            $data = $view->render();
            $count = $request->count + 5;
            $ticket_count = $tickets->count();
    
            return response()->json(['data'=>$data, 'count'=> $count,'ticket_count'=>$ticket_count]);
        }


        $tickets = Ticket::orderBy('id', 'desc')->skip($request->count)->take(5)->get();

            $status                 = Status::orderBy('id','ASC')->get();
            $priority               = Priority::all();
            $roles                  = UserRole::all();
            $department             = Department::all();
    
            $view = view('includes.tickets.index',compact('tickets', 'status', 'priority', 'roles', 'department'));
    
            $data = $view->render();
            $count = $request->count + 5;
            $ticket_count = $tickets->count();
    
            return response()->json(['data'=>$data, 'count'=> $count,'ticket_count'=>$ticket_count]);

    }

    public function individual_tickets_load_more(Request $request){

        if ($request->search_value) {

            $user_id         =  User::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $department_id   = Department::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $status_id       = Status::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');
            $priority_id     = Priority::where('name', 'LIKE','%' . $request->search_value . '%')->pluck('id');

            $tickets         = Ticket::where('status', $request->stat_id)->where('id','LIKE','%' . $request->search_value . '%')->skip($request->count)->take(5)->get();
            
            $mycount = $tickets->count();

            if($mycount == 0){
                $tickets         = Ticket::where('status', $request->stat_id)->whereIn('priority', $priority_id)->skip($request->count)->take(5)->get();
            }

            $mycount2 = $tickets->count();

            if($mycount2 == 0){
                $tickets         = Ticket::where('status', $request->stat_id)->whereIn('department', $department_id)->skip($request->count)->take(5)->get();
            }

            $mycount3 = $tickets->count();

            if($mycount3 == 0){
                $tickets         = Ticket::where('status', $request->stat_id)->where('subject', 'LIKE','%' . $request->search_value . '%')->skip($request->count)->take(5)->get();
            }

            $mycount4 = $tickets->count();

            if($mycount4 == 0){
                $tickets         = Ticket::where('status', $request->stat_id)->whereIn('customer', $user_id)->skip($request->count)->take(5)->get();
            }

            $status                 = Status::orderBy('id','ASC')->get();
            $priority               = Priority::all();
            $roles                  = UserRole::all();
            $department             = Department::all();

            $view = view('includes.tickets.index',compact('tickets', 'status', 'priority', 'roles', 'department'));
    
            $data = $view->render();
            $count = $request->count + 5;
            $ticket_count = $tickets->count();
    
            
            return response()->json(['data'=>$data, 'count'=> $count,'ticket_count'=>$ticket_count]);
        }

        if ($request->from_date) {

            $from_date = Carbon::parse($request->from_date);
            $to_date    = Carbon::parse($request->to_date)->addDay();

            $tickets   = Ticket::where('status', $request->stat_id)->whereBetween('created_at', [$from_date, $to_date])->skip($request->count)->take(5)->get();
            
            $status                 = Status::orderBy('id','ASC')->get();
            $priority               = Priority::all();
            $roles                  = UserRole::all();
            $department             = Department::all();

            $view = view('includes.tickets.index',compact('tickets', 'status', 'priority', 'roles', 'department'));
    
            $data = $view->render();
            $count = $request->count + 5;
            $ticket_count = $tickets->count();
    
            return response()->json(['data'=>$data, 'count'=> $count,'ticket_count'=>$ticket_count]);
        }

        if ($request->agents_id) {

            $tickets   = Ticket::where('status', $request->stat_id)->whereJsonContains('agent_id', $request->agents_id)->skip($request->count)->take(5)->get();
            
            $status                 = Status::orderBy('id','ASC')->get();
            $priority               = Priority::all();
            $roles                  = UserRole::all();
            $department             = Department::all();

            $view = view('includes.tickets.index',compact('tickets', 'status', 'priority', 'roles', 'department'));
    
            $data = $view->render();
            $count = $request->count + 5;
            $ticket_count = $tickets->count();
    
            return response()->json(['data'=>$data, 'count'=> $count,'ticket_count'=>$ticket_count]);
        }


        $tickets = Ticket::where('status', $request->stat_id)->orderBy('id', 'DESC')->skip($request->count)->take(5)->get();

            $status                 = Status::orderBy('id','ASC')->get();
            $priority               = Priority::all();
            $roles                  = UserRole::all();
            $department             = Department::all();
    
            $view = view('includes.tickets.index',compact('tickets', 'status', 'priority', 'roles', 'department'));
    
            $data = $view->render();
            $count = $request->count + 5;
            $ticket_count = $tickets->count();
    
            return response()->json(['data'=>$data, 'count'=> $count,'ticket_count'=>$ticket_count]);

    }

    // admin clear all notification
    public function admin_clear_all_notification(){
        Notification::where('role_id', '!=', 1)->where('read_status', 0)->update([
            'read_status' => 1,
        ]);
        
        return back()->with('success', 'Clear All Notifications!');
    }

    // chart ticket analytics for admin
    public function ticket_analytics_admin(Request $request){

        $search_data = $request->data;

        if ($request->data == 'year') {
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

            $data = view('includes.chart.admin_ticket_analytics', compact('total_ticket', 'solved_ticket', 'pending_ticket', 'opened_ticket', 'search_data'))->render();
            return response()->json(['data' => $data]);

        } else {

            $total_ticket               = [];
            $solved_ticket              = [];
            $pending_ticket             = [];
            $opened_ticket              = [];
            $all_days                   = [];
            $total_days = Carbon::now()->daysInMonth;

            for ($i=1; $i <= $total_days ; $i++) { 
                
                $total_ticket  []    = Ticket::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->whereDay('created_at', $i)->count();
                $solved_ticket []    = Ticket::whereYear('created_at',date('Y'))->whereMonth('created_at', date('m'))->whereDay('created_at', $i)->where('status',3)->count();
                $pending_ticket []   = Ticket::whereYear('created_at',date('Y'))->whereMonth('created_at', date('m'))->whereDay('created_at', $i)->where('status',2)->count();
                $opened_ticket []    = Ticket::whereYear('created_at',date('Y'))->whereMonth('created_at', date('m'))->whereDay('created_at', $i)->where('status',1)->count();
                $all_days [] = $i;
            }


            $data = view('includes.chart.admin_ticket_analytics', compact('total_ticket', 'solved_ticket', 'pending_ticket', 'opened_ticket', 'search_data', 'all_days'))->render();
            return response()->json(['data' => $data]);
        }
        

        

        
    }

    // current issues chart for admin
    public function current_issues_chart(Request $request){

       $search_data = $request->year;


       if ($search_data == 'current_year') {
            
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
           
        $data = view('includes.chart.current_issues_chart_render', compact('total_ticket', 'solved_ticket', 'pending_ticket', 'opened_ticket', 'search_data'))->render();
        return response()->json(['data' => $data]);

       } else {
            
            $year = date("Y");
            $previousyear = $year -1;

            // ticket analytics for admin
            $total_ticket               = [];
            $solved_ticket              = [];
            $pending_ticket             = [];
            $opened_ticket              = [];

            for ($i=1; $i <=12 ; $i++) {
                $total_ticket []     = Ticket::whereYear('created_at', $previousyear)->whereMonth('created_at', $i)->count();
                $solved_ticket []    = Ticket::whereYear('created_at', $previousyear)->whereMonth('created_at',$i)->where('status',3)->count();
                $pending_ticket []   = Ticket::whereYear('created_at', $previousyear)->whereMonth('created_at',$i)->where('status',2)->count();
                $opened_ticket []    = Ticket::whereYear('created_at', $previousyear)->whereMonth('created_at',$i)->where('status',1)->count();
            }
            
            $data = view('includes.chart.current_issues_chart_render', compact('total_ticket', 'solved_ticket', 'pending_ticket', 'opened_ticket', 'search_data'))->render();
            return response()->json(['data' => $data]);
        }
       
    }   

}
