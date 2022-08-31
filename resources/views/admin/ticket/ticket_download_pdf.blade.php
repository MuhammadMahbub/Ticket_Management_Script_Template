<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ticket</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-header"> Support Ticket List </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Assignee') }}</th>
                                    <th>{{ __('Subjects') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Priority') }}</th>
                                    <th>{{ __('Created Date') }}</th>
                                </tr>
                            </thead>
                            <tbody id="render_tickets">
                                @foreach ($all_ticket_list as $ticket) 
                                    <tr>
                                        <td>#{{ $ticket->id }}</td>
                                        <td>{{ $ticket->get_customer->name ?? 'No Exists'}}</td>
                                        <td>
                                            @if ($ticket->agent_id)
                                                @foreach (json_decode($ticket->agent_id) as $agent_id)
                                                    @php
                                                        $agent_name = App\Models\User::find($agent_id)->name;
                                                    @endphp
                                                    {{ $agent_name ?? 'NULL'}}
                                                    @if(!$loop->last) , @endif
                                                @endforeach
                                            @else
                                                {{ 'Not appointee' }}
                                            @endif
                                        </td>
                                        <td>{{ $ticket->subject }}</td>
                                        <td>{{ $ticket->get_status->name ?? 'Pending'}}</td>
                                        <td>{{ $ticket->get_priority->name ?? 'NULL' }}</td>
                                        <td>{{ $ticket->created_at->format('d-M-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>   
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        window.print();
    </script>
</body>
</html>