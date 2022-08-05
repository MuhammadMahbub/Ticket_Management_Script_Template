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


<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button permission_class" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <span style="    color: #080808;font-size: 20px;margin-right: 10px;margin-top: -2px;"><i class="fa-solid fa-lock"></i> </span>  {{ __('Permission') }}
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
                <div class="form-check form-switch select_all_checkbox">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="checkAll(this)">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> {{ __('Select All') }} </label>

                </div>

                @php
                    $all_navigations = App\Models\Navigation::all();
                @endphp
                @if ($selected_permission) 
                    @foreach ($all_navigations as $item)
                        <div class="form-check form-switch">
                            <input class="form-check-input inner-checkbox" {{ in_array($item->id, $selected_permission)? 'checked' : '' }} name="permission[]" value="{{ $item->id }}" type="checkbox" id="flexSwitchCheckDefault{{ $item->id }}">
                            <label class="form-check-label" for="flexSwitchCheckDefault{{ $item->id }}"> {{ $item->name }}</label>
                        </div>
                    @endforeach
                @endif

        </div>
      </div>
    </div>
  </div>






