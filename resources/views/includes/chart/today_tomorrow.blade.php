@foreach ($today_best_ticket as $item)

    {{-- @if ($item->get_ticket->count() > 0) --}}
        <tr>
            {{-- <td>{{ $item->get_customer->name }}</td> --}}
            <td>{{ \App\Models\User::find($item->customer)->name }}</td>

                <td>{{ $item->total }}</td>

            <td>
            <div class="rounded-circle" style="width: 30%;">
                @if (\App\Models\User::find($item->customer)->get_country_name->name == 'France')
                    <img src="{{ asset('uploads/country_flug/france.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Bangladesh')
                    <img src="{{ asset('uploads/country_flug/bangladesh.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'United Kingdom')
                    <img src="{{ asset('uploads/country_flug/uk.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'United States')
                    <img src="{{ asset('uploads/country_flug/us.png') }}" width="30" height="30" alt="1">
                    @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Afghanistan')
                    <img src="{{ asset('uploads/country_flug/afghanistan.png') }}" width="30" height="30" alt="1">
                    @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Algeria')
                    <img src="{{ asset('uploads/country_flug/algeria.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Argentina')
                    <img src="{{ asset('uploads/country_flug/argentina.jpg') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Brazil')
                    <img src="{{ asset('uploads/country_flug/brazil.jpg') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'China')
                    <img src="{{ asset('uploads/country_flug/china.jpg') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Canada')
                    <img src="{{ asset('uploads/country_flug/canada.jpg') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Egypt')
                    <img src="{{ asset('uploads/country_flug/egypt.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Germany')
                    <img src="{{ asset('uploads/country_flug/germany.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Australia')
                    <img src="{{ asset('uploads/country_flug/australia.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'India')
                    <img src="{{ asset('uploads/country_flug/india.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Iran')
                    <img src="{{ asset('uploads/country_flug/iran.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Iraq')
                    <img src="{{ asset('uploads/country_flug/iraq.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Italy')
                    <img src="{{ asset('uploads/country_flug/italy.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Japan')
                    <img src="{{ asset('uploads/country_flug/japan.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Portugal')
                    <img src="{{ asset('uploads/country_flug/portugal.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Russia')
                    <img src="{{ asset('uploads/country_flug/russia.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Spain')
                    <img src="{{ asset('uploads/country_flug/spain.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'South Africa')
                    <img src="{{ asset('uploads/country_flug/south_africa.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'South Korea')
                    <img src="{{ asset('uploads/country_flug/south_korea.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Sweden')
                    <img src="{{ asset('uploads/country_flug/sweden.png') }}" width="30" height="30" alt="1">
                @elseif(\App\Models\User::find($item->customer)->get_country_name->name == 'Switzerland')
                    <img src="{{ asset('uploads/country_flug/switzerland.png') }}" width="30" height="30" alt="1">
                @endif
            </div>
            </td>

        </tr>
    {{-- @endif --}}
@endforeach