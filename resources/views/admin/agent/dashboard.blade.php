<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5 congratulations">
                <div class="card-body text-center">
                    <img src="{{ asset('dashboard_assets/assets/images/customer_page/decore-left.png') }}" class="congrates_img-left" alt="decore-left.png">
                    <img src="{{ asset('dashboard_assets/assets/images/customer_page/decore-right.png') }}" class="congrates_img-right" alt="decore-right.png">
                    <div class="congrates_avatar">
                        <div class="congrates_avatar-icon">
                            <i class="fa-solid fa-award congrates__icon"></i>
                        </div>
                    </div>
                    <div class="card-text">
                        <h3 class="card-text_heading">{{ _('Welcome') }} {{ Auth::user()->name }}</h3>
                        <p>{{ __('You are logged in into your dahsboard!') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="chart mt-3">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="chart__left bg-white p-3 rounded">
                        <div class=" chart__left__heading d-flex justify-content-between">
                            <div class="chart_left_heading_left">
                                <h4>{{ __('Your Ticket Analyticks') }}</h4>
                            </div>
                            <div class="chart_left_heading_right">
                                {{-- <select class="form-select chart_left_heading_right--select border-0" aria-label="Default select example">
                                    <option selected>{{ __('Yearly') }}</option>
                                    <option value="1">{{ __('Month') }}</option>
                                </select> --}}
                            </div>
                        </div>
                        <div id="agent_chart_ticket"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>