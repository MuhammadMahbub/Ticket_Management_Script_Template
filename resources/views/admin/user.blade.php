@extends('layouts.app_backend')

@section('content')
<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE USER=====-->
    <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Userfff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">user Name</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Select Role</label>
                            <select class="form-select" aria-label="Default select example">
                                <option>Select Role</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-top-0">
                    <button style="background-color: #6C7BFF; color: #ffffff;" type="button"
                        class="btn w-100">Create
                        Team</button>
                </div>
            </div>
        </div>
    </div>
    <!--==========Team Header==========-->
    <div class="team_header d-flex justify-content-between flex-wrap mt-3">
        <div class="team_header__left">
            <div class="input-group mb-3">
                <button class="btn bg-white" type="button" id="button-addon1"><i
                        class="fa-solid fa-magnifying-glass"></i></button>

                <input type="text" class="form-control border-0" placeholder="Search Here"
                    aria-label="Example text with button addon" aria-describedby="button-addon1">

                <span>
                    <button class="btn tickets_header_btn ms-3">Done</button>
                </span>
            </div>
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" data-bs-target="#createUser" data-bs-whatever="@mdo">
                <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                Create User
            </button>
            <button data-bs-toggle="modal" data-bs-target="#createModal" data-bs-whatever="@mdo">
                Access and Permission
            </button>
        </div>
    </div>
    <!--==========User Table==========-->
    <div class="user_list user-page table-responsive">
        <table class="table table-hover" id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID Number</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">#9767</th>
                    <td>
                        <img src="{{ asset('dashboard_assets/assets') }}/images/users/user.png" alt="user.png">
                        <span class="ms-1">Alexxender Burt</span>
                    </td>
                    <td>
                        Shamimalhasan582@gmail.com
                    </td>
                    <td>2 April 2021</td>
                    <td>Graphic Design</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- other content -->
</div>
@endsection