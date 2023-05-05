@extends('layouts.app_backend')

@section('title') |
    @php
        echo App\Models\Navigation::where('route','user_role.index')->first()->name;
    @endphp
@endsection

@section('user_role.index')
    active
@endsection

@section('css')
    <style>
        .form-check{
        margin-left: 70px !important;
    }
    .form-check-input{
        cursor: pointer;
        font-size: 18px;
    }
    .form-check-label{
        cursor: pointer;
    }
    .select_all_checkbox{
        margin-left: 45px !important;
        margin-bottom: 10px !important;
    }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <!--=====MODAL FOR CREATE ROLE=====-->
        <!-- Vertically centered modal -->

        <div class="modal fade" id="createRole" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 modal_header">
                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Create Role') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user_role.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="role" class="col-form-label">{{ __('Role') }}<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="role" id="role" value="{{ old('role') }}">
                                @error('role')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button permission_class" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span style="    color: #080808;font-size: 20px;margin-right: 10px;margin-top: -2px;"><i class="fa-solid fa-lock"></i> </span>  {{ __('Permission') }} <span style="margin-left: 5px;margin-top: -2px;"> * </span>
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                                <div class="form-check form-switch select_all_checkbox">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="checkAll(this)">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">{{ __('Select All') }}</label>
                                                </div>
                                                @php
                                                    $all_navigations = App\Models\Navigation::all();
                                                @endphp

                                                @foreach ($all_navigations as $item)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input inner-checkbox" name="permission[]" value="{{ $item->id }}" type="checkbox" id="flexSwitchCheckDefault{{ $item->id }}">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault{{ $item->id }}"> {{ $item->name }}</label>
                                                    </div>
                                                @endforeach
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                                @error('permission')
                                        <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                <button  type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--==========Team Header==========-->
        <div class="team_header d-sm-flex justify-content-between flex-wrap mt-3 mb-3">
            <div class="team_header__left">
            </div>
            <div class="team_header__right">
                <button data-bs-toggle="modal" class="w-100 w-sm-auto" data-bs-target="#createRole" data-bs-whatever="@mdo">
                    <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                    {{ __('Create Role') }}
                </button>
            </div>
        </div>

        {{-- <div class="current_tickets_heading d-sm-flex justify-content-between mt-5 mb-0">
            <div class="current_tickets_heading__left">
                <h3>{{ __('User Role') }}</h3>
            </div>
            <div class="current_tickets_heading__right d-flex align-items-center">
                <div class="input-group mb-3 me-2">
                    <button class="btn bg-white" id="button-addon1">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <input type="text" id="search_tickets" class="form-control border-0" placeholder="Search Here.."  name="Search Keyword">
                </div>
            </div>
        </div> --}}

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
                                <input type="text" id="search_role" class="form-control border-0" placeholder="Search Here.."  name="Search Keyword">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <form> --}}

            {{-- </form> --}}
        </div>
        
        <!--==========User Table==========-->
        <div class="user_list user-page table-responsive">
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Serial') }}</th>
                        <th scope="col">{{ __('Role') }}</th>
                        <th scope="col">{{ __('Permission') }}</th>
                        <th scope="col">{{ __('Created Date') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody id="render_roles">
                    @include('includes.user_role.index')
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mt-5">
            <!-- Load More -->
            {{-- <div class="load_more_button">
                <div class="mt-10 text-center">
                <a id="load-more" data-count="5" class="load__more__btn load_more bg-accent shadow-accent-volume hover:bg-accent-dark inline-block rounded-full text-center font-semibold text-white transition-all">
                    Load More
                </a>
                </div>
            </div> --}}
        </div>
        <!-- other content -->
    </div>
@endsection

@section('js')
    <script>
        function checkAll(myCheckbox){

        var checkboxes = document.querySelectorAll(".inner-checkbox");

        if(myCheckbox.checked){
            checkboxes.forEach(function(checkbox){
                checkbox.checked = true;
            });
        }
        else{
            checkboxes.forEach(function(checkbox){
                checkbox.checked = false;
            });
        }
        }
    </script>

    {{-- search wise tickets --}}
    <script>
        $(document).ready(function() {
                $('#search_role').on('keyup',function(){
                    let search_value = $(this).val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('search.wise.role') }}",
                        data: {
                            search_value: search_value,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_roles').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                            } else {
                                $('#render_roles').html(response.data);
                            }

                            if ((1*response.count) < 5) {
                                $('.load_more_button').hide();
                            }else{
                                $('.load_more_button').show();

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
                        url: "{{ route('date.wise.user_role') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_roles').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                            } else {
                                $('#render_roles').html(response.data);
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
                        url: "{{ route('date.clear.wise.user_role') }}",

                        success: function(response) {
                            $('#render_roles').html(response.data);

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
