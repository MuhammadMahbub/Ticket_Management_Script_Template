@foreach ($admin_notifications as $notification)  
    <li class="single--item">
        <div>
            <a class="dropdown-item dropDown__inner"  href="{{ route('notification.unread', $notification->id) }}">
                <img src="{{ App\Models\User::find($notification->user_id)->profile_photo_url }}" class="me-2" alt="" width="30" height="30" style="border-radius: 50%">
    
                <p class="m-0" style="font-weight: bold; margin-right:8px !important"> {{  App\Models\User::find($notification->user_id)->name }} </p>
    
                <p class="m-0"> {{ $notification->notify_body }} <span style="font-weight: bold">"{{ $notification->created_at->format('d M Y') }}" </span> at <span style="font-weight: bold">{{ $notification->created_at->format('h:i a') }}</span> </p>
                {{-- <span class="mark_read_icon"><i class="fa-brands fa-markdown"></i></span> --}}
            </a> 
           
            <a class="btn btn-sm btn-info mark__as__read__btn" data-id="{{ $notification->id }}" id="mark__as__read__btn" style="float: right; margin:3px 10px">{{ __('Clear') }}</a>
        </div>
    </li>
    <hr>
@endforeach

@if (count($admin_notifications) > 0)
    <div class="read_btn">
        <li class="dropdown-menu-footer" id="all_notification_footer">
            <a class="btn btn-danger mark_read_btn mark_read_btn_danger d-block" href="{{ route('mark.admin.notification') }}"> Mark As Read All Notification </a>
        </li>
        
        <li class="dropdown-menu-footer" id="all_notification_footer">
            <a class="btn btn-primary mark_read_btn mark_read_btn_info d-block" href="{{ route('notification.index') }}" style="margin: 20px 20px;"> View All Notification </a>
        </li>

        <li class="dropdown-menu-footer" id="all_notification_footer">
            <a class="btn btn-danger mark_read_btn clear_all_admin_notification d-block" href="{{ route('admin.clear.all.notification') }}"> Clear All Notification </a>
        </li>
        

    </div>  
@else
    <li class="single--item">
        <a class="dropdown-item dropDown__inner">
            <p class="m-0 text-danger">No notification available here!</p>
        </a> 
    </li>
@endif

<script>
    $(document).ready(function(){
        $('.mark__as__read__btn').on('click', function(){

                let notification_id = $(this).attr('data-id');

                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',   
                        url: "{{ route('mark.as.read') }}",
                        data: {
                            notification_id: notification_id
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    })
            });
        }); 
</script>




