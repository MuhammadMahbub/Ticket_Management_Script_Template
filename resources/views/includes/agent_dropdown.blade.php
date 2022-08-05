@if (isset($item))
    @if ($item->department)
        @php
            $agen  =  App\Models\Department::find($item->department);
            $agents = json_decode($agen->user_id);
        @endphp
    @endif
    
    @if ($agents)    
        @foreach ($agents as $agent)
            @if (isset($item->agent_id))
                <option  value="{{ $agent }}" {{ in_array($agent,json_decode($item->agent_id)) ? 'selected' : '' }}>{{ App\Models\User::find($agent)->name }} </option>
            @else
                <option value="{{ $agent }}">{{ App\Models\User::find($agent)->name ?? '' }} </option>
            @endif
        @endforeach
    @endif
@else

    @foreach ($agents as $agent)
        <option value="{{ $agent->id }}">{{ $agent->name }} </option>
    @endforeach

@endif


