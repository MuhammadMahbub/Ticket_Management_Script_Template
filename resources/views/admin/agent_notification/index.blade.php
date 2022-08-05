@extends('layouts.app_backend')

@section('title') |
   Notifications
@endsection

@section('notification_active')
    active
@endsection

@section('content')
    <div class="container-fluid px-4 conatiners">
        <!--======Modals======-->


        <!--==========profile heading==========-->
        <div class="profile_heading mt-3">
            <div class="profile_heading__navigation bg-white mt-3 px-3 d-flex flex-wrap rounded">
                <a href="{{ route('agent_notification.index') }}" class="item active">All Notifications ({{ $agent_notification_count }})</a>
            </div>
        </div>
        <!--==========Profile Banner==========-->

        <!--==========PERMISSION SWITCH==========-->
        <div class="notification-list" >
            @foreach ($agent_notifications as $notification)   
                @if ($notification->read_status == 0)
                    <div class="notification-list__item rounded active" >
                        <a href="{{ route($notification->route) }}" class="notification-list__item__link d-md-flex align-items-center">
                            <div class="d-flex align-items-center me-2">
                                <img src="{{ App\Models\User::find($notification->user_id)->profile_photo_url }}" class="notification-list__item__avatar rounded-circle" alt="user name">
                                <span class="notification-list__item__user-name ps-2">{{  App\Models\User::find($notification->user_id)->name }}</span>
                            </div>
                            <p class="mb-0 mx-auto">{{ $notification->notify_body }} <span style="font-weight: bold">"{{ $notification->created_at->format('d M Y') }}" </span> at <span style="font-weight: bold">{{ $notification->created_at->format('h:i a') }}</span></p>
                        </a>
                        <div class="notification-list__item__action">
                            {{-- <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"> --}}
                            <div class="dropdown">
                                <button class="btn dropdown-toggle dropdown-toggle--hide-icon" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if ($notification->read_status == 0)
                                        <li><a class="dropdown-item" href="{{ route('mark.as.read.redirect', $notification->id) }}"  style="cursor:pointer"><i class="fa-brands fa-markdown"></i> {{ __('Mark As Read') }}</a></li>

                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#removeNotification{{ $notification->id }}"  style="cursor:pointer"><i class="fa-solid fa-trash-can"></i> {{ __('Remove') }}</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('mark.as.unread', $notification->id) }}" style="cursor:pointer"><i class="fa-brands fa-markdown"></i> {{ __('Mark As Unread') }}</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#removeNotification{{ $notification->id }}"  style="cursor:pointer"><i class="fa-solid fa-trash-can"></i> {{ __('Remove') }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        
                        </div>
                    </div>
                    <hr>
                @else
                    <div class="notification-list__item rounded" >
                        <a href="{{ route($notification->route, $notification->ticket_id) }}" class="notification-list__item__link d-md-flex align-items-center">
                            <div class="d-flex align-items-center me-2">
                                <img src="{{ App\Models\User::find($notification->user_id)->profile_photo_url }}" class="notification-list__item__avatar rounded-circle" alt="user name">
                                <span class="notification-list__item__user-name ps-2">{{  App\Models\User::find($notification->user_id)->name }}</span>
                            </div>
                            <p class="mb-0 mx-auto">{{ $notification->notify_body }} <span style="font-weight: bold">"{{ $notification->created_at->format('d M Y') }}" </span> at <span style="font-weight: bold">{{ $notification->created_at->format('h:i a') }}</span></p>
                        </a>
                        <div class="notification-list__item__action">
                            {{-- <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"> --}}
                            <div class="dropdown">
                                <button class="btn dropdown-toggle dropdown-toggle--hide-icon" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if ($notification->read_status == 0)
                                        <li><a class="dropdown-item" href="{{ route('mark.as.read.redirect', $notification->id) }}"  style="cursor:pointer"><i class="fa-brands fa-markdown"></i> {{ __('Mark As Read') }}</a></li>

                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#removeNotification{{ $notification->id }}"  style="cursor:pointer"><i class="fa-solid fa-trash-can"></i> {{ __('Remove') }}</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('mark.as.unread', $notification->id) }}" style="cursor:pointer"><i class="fa-brands fa-markdown"></i> {{ __('Mark As Unread') }}</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#removeNotification{{ $notification->id }}"  style="cursor:pointer"><i class="fa-solid fa-trash-can"></i> {{ __('Remove') }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        
                        </div>
                    </div>
                    <hr>
                @endif 
                
                {{-- Remove Notification Modal --}}
                <div class="modal fade" id="removeNotification{{ $notification->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 modal_header">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Remove Notification') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6>{{ __('Are You Sure?') }}</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                                <form action="{{ route('notification.destroy', $notification->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">{{ __('Remove') }}</button>
                                </form>
                            </div>

                        </div>
                    </div>
               </div>
            @endforeach
        </div>
    </div>
@endsection
