@if (count($all_languages) > 0)
    @forelse ($all_languages as $lang)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td> {{ $lang->name ?? '' }} </td>
            <td> {{ $lang->short_name ?? '' }} </td>
            <td> <img src="{{ asset('uploads/lang_flag') }}/{{ $lang->flag }}" alt="" width="30"> </td>
            <td>{{ $lang->created_at->format('d-m-Y') ?? '' }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editLanguage{{ $lang->id }}"><i class="fa-solid fa-edit" class="mr-50"></i> {{ __('Edit') }}</a></li>
                        <li>
                            <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteLanguage{{ $lang->id }}" style="cursor: pointer"> <i class="fa-solid fa-trash"></i> {{ __('Delete') }} </a>
                        </li>
                    </ul>

                </div>
            </td>
        </tr>

        {{-- delete modal --}}
        <div class="modal fade" id="deleteLanguage{{ $lang->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0 modal_header">
                            <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Delete Language') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>{{ __('Are You Sure?') }}</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                            <form action="{{ route('language.destroy', $lang->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        </div>

                    </div>
                </div>
        </div>

        {{-- Edit Modal --}}
        <div class="modal fade" id="editLanguage{{ $lang->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 modal_header">
                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Edit Language') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('language.update',$lang->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="name" class="col-form-label">{{ __('Language') }}<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $lang->name }}">
                                @error('name')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="short_name" class="col-form-label">{{ __('Short Name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="short_name" class="form-control" id="short_name" value="{{ $lang->short_name }}">
                                @error('short_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="flag" class="col-form-label">{{ __('Flag') }}</label>
                                <input type="file" name="flag" class="form-control" id="flag">
                                @error('flag')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="flag" class="col-form-label">{{ __('Previous Flag') }} <img width="50" src="{{ asset('uploads/lang_flag') }}/{{ $lang->flag }}" alt="">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                <button  type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <tr><td colspan="4"> <h3 class="text-center text-danger">{{ __('No Data Available Here!') }}</h3></td></tr>
    @endforelse
@endif