<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\RegisterPageController;
use App\Http\Controllers\ColorSettingController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\LanguageController;

// Language localization
Route::get('locale/{locale}', function($locale){
    Session::put('locale', $locale);
        return back();
})->name('locale');


// redirect login page
Route::redirect('/', 'login');

Route::post('get/country', [AdminController::class, 'get_country'])->name('get_country');

Route::prefix('google')->group(function () {
    Route::get('login', [SocialiteController::class, 'googleRedirect'])->name('googleRedirect');
    Route::get('callback', [SocialiteController::class, 'googleCallback'])->name('googleCallback');
});

// group middleware for admin, agent customer
Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    Route::resource('language', LanguageController::class);

    Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('dashboard');

    Route::get('team', [AdminController::class, 'team'])->name('team');
    Route::get('user', [AdminController::class, 'user'])->name('user');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');

    Route::resource('navigation', NavigationController::class);

    Route::resource('ticket', TicketController::class);

    Route::post('/get/users', [TicketController::class, 'get_users'])->name('get.users');
    Route::post('/edit/users', [TicketController::class, 'edit_users'])->name('edit.users');
    Route::post('/get/agents', [TicketController::class, 'get_agents'])->name('get.agents');

    // ticket message
    Route::post('/get/message', [TicketController::class, 'get_message'])->name('get.message');
    Route::post('/get/message/render', [TicketController::class, 'getMessageRender'])->name('get.message.render');

    //Notification render working route
    Route::post('get/render/notification', [TicketController::class, 'getRenderNotification'])->name('get.render.notification');
    Route::post('get/agent/render/notification', [TicketController::class, 'getAgentRenderNotification'])->name('get.agent.render.notification');
    Route::post('get/customer/render/notification', [TicketController::class, 'getCustomerRenderNotification'])->name('get.customer.render.notification');
    Route::post('render/view/all/notification', [TicketController::class, 'renderViewAllNotification'])->name('render.view.all.notification');

    // notification read unread option
    Route::get('mark/as/read/{notification_id}', [TicketController::class, 'mark_as_read_redirect'])->name('mark.as.read.redirect');
    Route::get('notification/un/read/{notification_id}', [TicketController::class, 'notification_unread'])->name('notification.unread');
    Route::delete('notification/destroy/{notification_id}', [TicketController::class, 'notification_destroy'])->name('notification.destroy');
    Route::post('mark/as/read', [TicketController::class, 'mark_as_read'])->name('mark.as.read');
    Route::get('mark/as/unread/{notification_id}', [TicketController::class, 'mark_as_unread'])->name('mark.as.unread');
    Route::get('mark/admin/notification/', [TicketController::class, 'mark_admin_notification'])->name('mark.admin.notification');

    Route::get('admin/clear/all/notification', [TicketController::class, 'admin_clear_all_notification'])->name('admin.clear.all.notification');


    Route::get('mark/agent/notification/', [TicketController::class, 'mark_agent_notification'])->name('mark.agent.notification');
    Route::get('mark/customer/notification/', [TicketController::class, 'mark_customer_notification'])->name('mark.customer.notification');
    Route::get('view/all/notification/', [TicketController::class, 'view_all_notification'])->name('notification.index');
    Route::get('view/agent/notification/', [TicketController::class, 'view_agent_notification'])->name('agent_notification.index');
    Route::get('view/customer/notification/', [TicketController::class, 'view_customer_notification'])->name('customer_notification.index');



    Route::delete('/customer/ticket/delete/{id}', [TicketController::class, 'customer_ticket_delete'])->name('customer_ticket.destroy');
    Route::get('/customer/ticket/show/{id}', [TicketController::class, 'customer_ticket_show'])->name('customer_ticket.show');

    Route::get('/ticket/reply/{id}', [TicketController::class, 'ticket_reply'])->name('ticket.reply');
    Route::post('/ticket/reply', [TicketController::class, 'ticket_reply_store'])->name('ticket_reply.store');

    Route::get('create/ticket/show', [TicketController::class, 'admin_create_ticket_show'])->name('admin_create_ticket.show');
    Route::get('individual/ticket/show/{status_id}', [TicketController::class, 'individual_ticket_show'])->name('individual_ticket.show');
    Route::get('all/tickets/show/', [TicketController::class, 'all_tickets_show'])->name('all_tickets.show');
    Route::get('soft/deleted/tickets/show/', [TicketController::class, 'soft_deleted_tickets'])->name('soft_deleted_tickets');
    Route::get('restore/tickets/{id}', [TicketController::class, 'ticket_restore'])->name('ticket_restore');
    Route::get('permanent/delete/tickets/{id}', [TicketController::class, 'permanent_delete'])->name('permanent_delete');

    //customer ticket create
    Route::post('/customer/ticket', [TicketController::class, 'customer_ticket'])->name('customer_ticket.store');
    Route::put('/assign/ticket/{id}', [TicketController::class, 'ticket_assign'])->name('ticket.assign');
    Route::put('/customer/ticket/update/{id}', [TicketController::class, 'customer_ticket_update'])->name('customer_ticket.update');
    Route::put('/admin/ticket/update/{id}', [TicketController::class, 'admin_ticket_update'])->name('admin_ticket.update');
    Route::put('/agent/ticket/update/{id}', [TicketController::class, 'agent_ticket_update'])->name('agent_ticket.update');

    //User Role controller
    Route::resource('user_role', UserRoleController::class);

    //Create User controller
    Route::resource('users', UserController::class);
    Route::post('role/permission/area', [UserController::class, 'get_role_permission_area'])->name('get_permission.users');

    Route::resource('priority', PriorityController::class);
    Route::resource('status', StatusController::class);
    Route::resource('department', DepartmentController::class);

    Route::post('/edit/department', [DepartmentController::class, 'edit_dapartment'])->name('edit.department');

    // language working route
    Route::get('/api/lang/edit', [LanguageController::class, 'lang_edit'])->name('lang_edit');
    Route::get('/api/language/change/{key}', [LanguageController::class, 'language_wise_data'])->name('language_wise_data');
    Route::post('/api/language/edit', [LanguageController::class, 'language_edit'])->name('language_edit');
    Route::post('/api/lang/update', [LanguageController::class, 'lang_update'])->name('lang_update');
    Route::get('/api/key/', [AdminController::class, 'google_api_key'])->name('google_api_key');
    Route::put('/api/key/update', [AdminController::class, 'update_api_key'])->name('update_api_key');

    //loginPage Controller
    Route::resource('login_page', LoginPageController::class);

    //RegisterPage Controller
    Route::resource('register_page', RegisterPageController::class);

    //color settings controller
    Route::resource('colorSettings', ColorSettingController::class);

    //general settings controller
    Route::resource('generalSettings', GeneralSettingController::class);

    // search tickets
    Route::post('search/wise/tickets/', [TicketController::class, 'search_wise_tickets'])->name('search.wise.tickets');
    Route::post('search/wise/deleted/tickets/', [TicketController::class, 'search_wise_deleted_tickets'])->name('search.wise.deleted.tickets');


    
    
    Route::post('date/wise/tickets/', [TicketController::class, 'date_wise_tickets'])->name('date.wise.tickets');
    Route::post('date/wise/deleted/tickets/', [TicketController::class, 'date_wise_deleted_tickets'])->name('date.wise.deleted.tickets');
    Route::post('date/clear/wise/tickets/', [TicketController::class, 'date_clear_wise_tickets'])->name('date.clear.wise.tickets');
    Route::post('date/clear/wise/deleted/tickets/', [TicketController::class, 'date_clear_wise_deleted_tickets'])->name('date.clear.wise.deleted.tickets');
    
    
    Route::post('agent/wise/tickets/', [TicketController::class, 'agent_wise_tickets'])->name('agent.wise.tickets');
    Route::post('agent/clear/wise/tickets/', [TicketController::class, 'agent_clear_wise_tickets'])->name('agent.clear.wise.tickets');

    Route::post('agent/wise/deleted/tickets/', [TicketController::class, 'agent_wise_deleted_tickets'])->name('agent.wise.deleted.tickets');
    Route::post('agent/clear/wise/deleted/tickets/', [TicketController::class, 'agent_clear_wise_deleted_tickets'])->name('agent.clear.wise.deleted.tickets');


    Route::post('individual/search/wise/tickets/', [TicketController::class, 'individual_search_wise_tickets'])->name('individual_search.wise.tickets');

    // ticket load more route
    Route::post('/tickets/load-more', [TicketController::class,'tickets_load_more'])->name('tickets.load-more');
    Route::post('deleted/tickets/load-more', [TicketController::class,'deleted_tickets_load_more'])->name('deleted.tickets.load-more');


    Route::post('search/tickets/load-more', [TicketController::class,'search_tickets_load_more'])->name('search_tickets.load-more');
    Route::post('individual/tickets/load-more', [TicketController::class,'individual_tickets_load_more'])->name('individual_tickets.load-more');
    Route::post('individual/date/wise/tickets/', [TicketController::class, 'individual_date_wise_tickets'])->name('individual_date.wise.tickets');
    Route::post('individual/agent/wise/tickets/', [TicketController::class, 'individual_agent_wise_tickets'])->name('individual_agent.wise.tickets');


    // ticket all chart
    Route::post('ticket/analytics/admin', [TicketController::class, 'ticket_analytics_admin'])->name('ticket.analytics.admin');
    // current issues chart
    Route::post('current/issues/chart', [TicketController::class, 'current_issues_chart'])->name('current.issues.chart');

    // today tomorrow wise ticket filter
    Route::post('today_tomorrow/wise/filter/ticket', [TicketController::class, 'today_tomorrow_wise_filter_ticket'])->name('today_tomorrow.wise.filter.ticket');
    Route::post('today/tomorrow/ticket', [TicketController::class, 'today_tomorrow_ticket'])->name('today.tomorrow.ticket');

    // update ticket status
    Route::post('update/ticket/status', [TicketController::class, 'update_ticket_status'])->name('update.ticket.status');

    // bulk export import delete
    Route::post('filter/by/all/tickets', [TicketController::class, 'filter_by_all_tickets'])->name('filter.by.all.tickets');
    Route::post('filter/by/single/ticket', [TicketController::class, 'filter_by_single_ticket'])->name('filter.by.single.ticket');
    Route::delete('selected/ticket/delete', [TicketController::class, 'selected_ticket_delete'])->name('selected.ticket.delete');

    Route::post('filter/by/all/soft/tickets', [TicketController::class, 'filter_by_all_soft_tickets'])->name('filter.by.all.soft.tickets');
    Route::post('filter/by/single/soft/ticket', [TicketController::class, 'filter_by_single_soft_ticket'])->name('filter.by.single.soft.ticket');
    Route::delete('selected/soft/ticket/delete', [TicketController::class, 'selected_soft_ticket_delete'])->name('selected.soft.ticket.delete');
    Route::post('selected/soft/ticket/restore', [TicketController::class, 'selected_soft_ticket_restore'])->name('selected.soft.ticket.restore');

    //ticket assign individually
    Route::post('ticket/assign/team/individually', [TicketController::class, 'ticket_assign_team_individually'])->name('ticket.assign.team.individually');

    // search wise user role
    Route::post('search/wise/role', [UserRoleController::class, 'search_wise_role'])->name('search.wise.role');
    Route::post('date/wise/user/role', [UserRoleController::class, 'date_wise_user_role'])->name('date.wise.user_role');
    Route::post('date/clear/wise/user/role', [UserRoleController::class, 'date_clear_wise_user_role'])->name('date.clear.wise.user_role');
    
    // search wise users
    Route::post('search/wise/user', [UserController::class, 'search_wise_user'])->name('search.wise.user');
    Route::post('date/wise/user', [UserController::class, 'date_wise_user'])->name('date.wise.user');
    Route::post('date/clear/wise/user', [UserController::class, 'date_clear_wise_user'])->name('date.clear.wise.user');
    // search wise priority
    Route::post('search/wise/priority', [PriorityController::class, 'search_wise_priority'])->name('search.wise.priority');
    Route::post('date/wise/priority', [PriorityController::class, 'date_wise_priority'])->name('date.wise.priority');
    Route::post('date/clear/wise/priority', [PriorityController::class, 'date_clear_wise_priority'])->name('date.clear.wise.priority');
    // search wise status
    Route::post('search/wise/status', [StatusController::class, 'search_wise_status'])->name('search.wise.status');
    Route::post('date/wise/status', [StatusController::class, 'date_wise_status'])->name('date.wise.status');
    Route::post('date/clear/wise/status', [StatusController::class, 'date_clear_wise_status'])->name('date.clear.wise.status');
    // search wise department
    Route::post('search/wise/department', [DepartmentController::class, 'search_wise_department'])->name('search.wise.department');
    Route::post('date/wise/department', [DepartmentController::class, 'date_wise_department'])->name('date.wise.department');
    Route::post('date/clear/wise/department', [DepartmentController::class, 'date_clear_wise_department'])->name('date.clear.wise.department');

    // search wise department
    Route::post('search/wise/navigation', [NavigationController::class, 'search_wise_navigation'])->name('search.wise.navigation');
    Route::post('date/wise/navigation', [NavigationController::class, 'date_wise_navigation'])->name('date.wise.navigation');
    Route::post('date/clear/wise/navigation', [NavigationController::class, 'date_clear_wise_navigation'])->name('date.clear.wise.navigation');
    
    // search wise department
    Route::post('search/wise/language', [LanguageController::class, 'search_wise_language'])->name('search.wise.language');
    Route::post('date/wise/language', [LanguageController::class, 'date_wise_language'])->name('date.wise.language');
    Route::post('date/clear/wise/language', [LanguageController::class, 'date_clear_wise_language'])->name('date.clear.wise.language');

});

// json file download
Route::get('json_file/download', function(){
    return response()->download(resource_path('lang/fr.json'));
})->name('json_file_download');
