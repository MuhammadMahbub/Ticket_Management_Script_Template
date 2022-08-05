<?php

function socialite()
{
    return \App\Models\Socialite::first();
}

// login page setup 
function login_page_info()
{
    return \App\Models\LoginPage::first();
}

// register page setup
function register_page_info()
{
    return \App\Models\RegisterPage::first();
}

// Color Settings
function colorSettings()
{
    return \App\Models\ColorSetting::first();
}

// general Settings
function generalSettings()
{
    return \App\Models\GeneralSetting::first();
}

function get_agent_notification_count(){

    $all_notifications = \App\Models\Notification::all();
    $notification_id   = [];

    foreach ($all_notifications as $notification) {
        if (Auth::id() == $notification->assign_id) {
            $notification_id[] = $notification->id;
        }
    }

    $agent_notification_count = \App\Models\Notification::whereIn('id', $notification_id)->count();
    return $agent_notification_count;

}

function get_customer_notification_count(){

    $all_notifications   = \App\Models\Notification::all();
    $notification_id     = [];

    foreach ($all_notifications as $notification) {
        if (Auth::id() == $notification->customer_id) {
            $notification_id[] = $notification->id;
        }
    }

    $customer_notification_count = \App\Models\Notification::whereIn('id', $notification_id)->count();
    return $customer_notification_count;

}

function customer_notification_count_for_bel_icon(){
    $all_notifications = \App\Models\Notification::all();
    $notification_id   = [];

    foreach ($all_notifications as $notification) {
        if (Auth::id() == $notification->customer_id) {
            $notification_id[] = $notification->id;
        }
    }

    $customer_notification_count = \App\Models\Notification::whereIn('id', $notification_id)->where('read_status', 0)->count();
    return $customer_notification_count;
}

function admin_notification_count_for_bel_icon(){

    $admin_notification_count = \App\Models\Notification::where('role_id', '!=', 1)->where('read_status', 0)->count();
    return $admin_notification_count;
}

function agent_notification_count_for_bel_icon(){

    $all_notifications = \App\Models\Notification::all();
    $notification_id   = [];

    foreach ($all_notifications as $notification) {
        if (Auth::id() == $notification->assign_id) {
            $notification_id[] = $notification->id;
        }
    }
                    
    $agent_notification_count = \App\Models\Notification::whereIn('id', $notification_id)->where('read_status', 0)->count();
    return $agent_notification_count;

}

