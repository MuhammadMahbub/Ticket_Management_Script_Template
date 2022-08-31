
{{-- <p class="p-0 m-0 ">{{ $c_name }}</p>
<h5 class="mt-3 map_value">{{ $county_wise_customer_result }}</h5> --}}


<div class="map__map_heading text-center">
    <p class="p-0 m-0 ">{{ $c_name }}</p>
    <h5 class="mt-3 map_value">{{ $county_wise_customer_result }}</h5>
</div>
<div class="customer_count d-flex justify-content-between text-center map_heading">
    <div class=" customer_count_total cmn_style">
        <p class="mb-2">{{ __('Active Tickets') }}</p>
        <h3 style="color: #6C7BFF;" class="map_value">{{ $country_wise_ticket_active }}</h3>
    </div>
    <div class="divider"></div>
    <div class="customer_count_active cmn_style">
        <p class="mb-2">{{ __('Solved Tickets') }}</p>
        <h3 style="color: #34DDAA;">{{ $country_wise_ticket_solved }}</h3>
    </div>
</div>



