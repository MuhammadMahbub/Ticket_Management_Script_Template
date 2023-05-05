@extends('layouts.app_backend')

@section('title')
   | {{ __('Navigation') }}
@endsection

@section('navigation.index')
    active
@endsection

@section('content')

<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE User=====-->


    <!--=====MODAL FOR CREATE User End =====-->
    <div class="team_header d-flex justify-content-between flex-wrap mt-3 ">
        <div class="team_header__left">
            <div class="input-group mb-3">

            </div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-xl-8">
            <div class="row align-items-end">
                <div class="col-md">
                    <div class="form-group mb-3">
                        <label class="form-label" for="from__date">From</label>
                        <input type="date" name="from_date" id="from__date" class="form-control">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-3">
                        <label class="form-label" for="to__date">To</label>
                        <input type="date" name="to_date" id="to__date" class="form-control">
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="form-group mb-3">
                        <button class="btn btn-primary w-100 w-sm-auto" id="filter__date">filter</button>
                        <button class="btn btn-danger w-100 w-sm-auto mt-2 mt-sm-0 d-none" id="clear__filter__date">Clear filter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="row align-items-end">
                <div class="col-md">
                    <div class="current_tickets_heading__right d-flex align-items-center">
                        <div class="input-group mb-3" style="margin-top: 32px">
                            <button class="btn bg-white" id="button-addon1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input type="text" id="search_navigation" class="form-control border-0" placeholder="Search Here.."  name="Search Keyword">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==========Navigation Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover dataTable">
            <thead>
                <tr>
                    <th scope="col">{{ __('Serial') }}</th>
                    <th scope="col">{{ __('Icon') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Created Date') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody id="render_navigation">
                @include('includes.navigation.index')
            </tbody>
        </table>
    </div>
    <!-- other content -->
</div>
@endsection

@section('js')
    {{-- search wise status --}}
    <script>
        $(document).ready(function() {
                $('#search_navigation').on('keyup',function(){
                    let search_value = $(this).val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('search.wise.navigation') }}",
                        data: {
                            search_value: search_value,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_navigation').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                            } else {
                                $('#render_navigation').html(response.data);
                            }


                        }
                    })

                });
            });
    </script>

    {{-- filter by date js --}}
    <script>
        $(document).ready(function() {
                $('#filter__date').on('click',function(){
                    let from_date = $('#from__date').val();
                    let to_date = $('#to__date').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('date.wise.navigation') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_navigation').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                            } else {
                                $('#render_navigation').html(response.data);
                            }

                            // if ((1*response.count) < 5) {
                            //     $('.load_more_button').hide();
                            // }else{
                            //     $('.load_more_button').show();

                            // }

                            $("#clear__filter__date").removeClass("d-none");
                        }
                    })

                });
                // clear filter
                $("#clear__filter__date").on("click", function(){
                    $(this).addClass("d-none");
                    $("#from__date").val("");
                    $("#to__date").val("");

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('date.clear.wise.navigation') }}",

                        success: function(response) {
                            $('#render_navigation').html(response.data);

                            // if ((1*response.count) < 5) {
                            //     $('.load_more_button').hide();
                            // }else{
                            //     $('.load_more_button').show();

                            // }
                        }
                    })
                });
            });
    </script>
@endsection