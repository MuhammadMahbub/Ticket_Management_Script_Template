@foreach ($tickets as $item)
    <script>

        $(document).ready(function() {
            $('#agent_dropdown{{ $item->id }}').select2({theme: "classic"});
            $('#agent_drop{{ $item->id }}').select2({theme: "classic"});
        });

    </script>
@endforeach

<script>
    $(document).ready(function() {
        $('#role_dropdown').change(function() {

            var role_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('get.users') }}",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    $('#user_dropdown').html(data.data)
                }
            })
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#role_drop').change(function() {

            var role_id = $(this).val();
            alert(role_id)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('edit.users') }}",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    $('#user_drop').html(data.data)
                }
            })
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#get_agent_dropdown').select2({theme: "classic"});
        $('#dept_dropdown').change(function() {

            var dept_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('get.agents') }}",
                data: {
                    dept_id: dept_id
                },
                success: function(data) {
                    $('#get_agent_dropdown').html(data.data)
                }
            })
        });
    });
</script>