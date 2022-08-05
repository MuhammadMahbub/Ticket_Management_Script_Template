@if (count($all_reply_individual_tickets) > 0)
    @foreach ($all_reply_individual_tickets as $item)
        @if ($item->user_id == Auth::id())
            <div class="bug_fixing_inbox_start__msg__rec_msg me-auto d-flex">
                <div class="bug_fixing_inbox_start__msg__rec_msg__img">
                </div>
                <div class="bug_fixing_inbox_start__msg__rec_msg__text">
                    <div class="bug_fixing_inbox_start__msg__rec_msg__text__one message">
                        @php
                            $profile_image = App\Models\User::find($item->user_id);
                        @endphp
                        <div class="image__title d-flex align-items-center">
                            <img src="{{ $profile_image->profile_photo_url }}" class="me-2" alt="" width="30" height="30" style="border-radius: 50%">
                            <h6 class="m-0">{{ $item->get_user_name_from_ticket->name }}</h6>
                        </div>
                        
                        <p class="m-0"> {{ $item->reply }}
                        </p>
                        <small>{{ $item->created_at->format('D') }} At {{ $item->created_at->format('h:i A') }}</small>
                    </div>
                </div>
            </div>
        @else
            <div
            class="bug_fixing_inbox_start__msg__outgoing_msg d-flex flex-row-reverse">
                <div class="bug_fixing_inbox_start__msg__outgoing_msg__new border_down">
                    @php
                        $profile_image = App\Models\User::find($item->user_id);
                    @endphp
                    <div class="image__title d-flex  align-items-center">
                        <img src="{{ $profile_image->profile_photo_url }}" class="me-2" alt="" width="30" height="30" style="border-radius: 50%">
                        <h6 class="m-0">{{ $item->get_user_name_from_ticket->name }}</h6>
                    </div>

                    <p class="m-0"> {{ $item->reply }}
                    </p>
                    <small>{{ $item->created_at->format('D') }} At {{ $item->created_at->format('h:i A') }}</small>
                </div>
            </div>
        @endif
    @endforeach
@else
    <span class="text-center text-danger"> {{ __('No message available here') }}... </span>
@endif
