@if($roles->count() > 0)
    @forelse($roles as $item)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>
            <a href="{{ route('user_role.show', $item->id) }}" style="text-decoration:none; color:#7b7f90">{{$item->role}}</a>
            </td>
            <td>
                @php
                    $permission = json_decode($item->permission);
                @endphp
                @foreach ($permission as $data)
                    {{ App\Models\Navigation::find($data)->name ?? '' }}
                    @if (!$loop->last) , @endif
                @endforeach
            </td>
            <td>{{ $item->created_at->format('d-M-Y') }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="mb-1"><a style="cursor: pointer" class="dropdown-item" href="{{ route('user_role.show', $item->id) }}"><i class="fa-solid fa-eye" class="mr-50"></i> {{ __('Show') }}</a></li>
                        <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="fa-solid fa-edit" class="mr-50"></i> {{ __('Edit') }}</a></li>
                        @if ($item->id != 1 && $item->id != 2 && $item->id != 3)
                            <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}"><i class="fa-solid fa-edit" class="mr-50"></i> {{ __('Delete') }}</a></li>
                        @endif
                    </ul>
                </div>
            </td>
        </tr>

        <!-- Modal Delete Role -->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"      aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal_header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Role') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>{{ __('Are You Sure?') }}</h6>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                            <form action="{{ route('user_role.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}
                            </form>
                        </button>
                    </div>
                </div>
            </div>
        </div>


    <!--=====MODAL FOR EDIT ROLE=====-->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 modal_header">
                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Update Role') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user_role.update',$item->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="role" class="col-form-label">{{ __('Role') }}<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="role" id="role" value="{{ $item->role }}">
                                @error('role')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            @php
                                $selected_permission = json_decode($item->permission);
                            @endphp
                            <div>
                                @include('includes.user_update_role')
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