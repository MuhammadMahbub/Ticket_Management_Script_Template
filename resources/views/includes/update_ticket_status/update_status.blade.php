@foreach ($status as $stat)
    <option value="{{ $stat->id }}" {{ $stat->id == $single_ticket_info->status ? 'selected' : ''}}> {{ $stat->name }} </option>
@endforeach