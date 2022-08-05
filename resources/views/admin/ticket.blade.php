@extends('layouts.app_backend')

@section('content')
<div class="container-fluid px-4">
    <!--==========Team Header==========-->
    <div class="current_ticket mt-3 d-flex justify-content-between flex-wrap">
        <div class="current_ticket__left">
            <div class="current_ticket__left__btn">
                <button class="btn item active">Current Ticket</button>
                <button class="btn item">Open Ticket</button>
                <button class="btn item">Closed Ticket</button>
                <button class="btn item">Solved Ticket</button>
                <button class="btn item">All</button>
            </div>
        </div>
        <div class="current_ticket__right">
            <div class="current_ticket__right__btn d-flex">
                <div class="current_ticket__right__btn__div me-2">
                    <button class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">
                        <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                        Create Ticket
                    </button>
                </div>

                <!--=====Create Tickets=====-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Create Ticket</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <label for="#">Find Customer</label>
                        <input type="text" class="form-control mt-2">

                        <label class="mt-3" for="#">Subject</label>
                        <input type="text" class="form-control mt-2">

                        <label class="mt-3" for="#">Type</label>
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected disabled>Select Type Of Ticket</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>

                        <label class="mt-3" for="#">Status</label>
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected disabled>Select Ticket Status</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>

                        <label class="mt-3" for="#">Priority</label>
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected disabled>Select Ticket Status</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>

                        <label class="mt-3" for="#">Asigne People</label>
                        <select class="js-example-basic-multiple form-select w-100 mt-1" name="states[]"
                            multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>

                        <label class="mt-3" for="#">Description</label>
                        <textarea style="resize: none;" class="form-control mt-1"
                            placeholder="Write Here...." id="floatingTextarea"></textarea>

                        <label class="mt-3" for="#">Tag</label>
                        <input type="text" class="form-control" placeholder="Enter Ticket Tag">

                        <button class="btn w-100 create_ticket_btn mt-3">Create Ticket</button>
                    </div>
                </div>
                <!--======End Create Tickets=====-->

                <div class="dropdown">
                    <button class="btn dropdown-toggle filter" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        filter
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-3 dropdown_list"
                        aria-labelledby="dropdownMenuButton1">
                        <h5>Filters</h5>
                        <label class="mb-2" for="#">Customers</label>
                        <input type="text" name="" id="" placeholder="Lara" class="form-control">
                        <label class="mb-2 mt-2" for="#">Agents</label>
                        <input type="text" class="form-control" placeholder="Select Options">
                        <label class="mb-2 mt-2" for="#">Departments</label>
                        <input type="text" class="form-control" placeholder="Select an Options">
                        <label class="mb-2 mt-2" for="#">Labels</label>
                        <input type="text" class="form-control" placeholder="Select an Options">
                        <label class="mb-2 mt-2" for="#">Status</label>
                        <input type="text" class="form-control" placeholder="Select an Options">
                        <label class="mb-2 mt-2" for="#">Priorities</label>
                        <input type="text" class="form-control" placeholder="Select an Options">
                        <label class="mb-2 mt-2" for="#">Sort</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                                <i class="fa-solid fa-arrow-up-short-wide"></i>
                                <span>Sort</span>
                            </button>
                            <input type="text" class="form-control" placeholder="Closed at"
                                aria-label="Example text with button addon"
                                aria-describedby="button-addon1">
                        </div>
                        <div class="filter_btn d-flex justify-content-evenly">
                            <button class="btn">close</button>
                            <button class="btn">save</button>
                        </div>
                        <!-- <li><a class="dropdown-item" href="#">Action</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
        <div class="current_tickets_heading__left">
            <h3>Current Tickets</h3>
        </div>
        <div class="current_tickets_heading__right">
            <div class="input-group mb-3">
                <button class="btn bg-white type=" button" id="button-addon1">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <input type="text" class="form-control border-0" placeholder="Search Ticketsffff.."
                    aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
        </div>
    </div>
    <!--==========Current Ticket Table===========-->
    <div class="current_tickets_table">
        <div class="support_ticket">
            <div class="col-lg-12">
                <div class="support">
                    <!-- <div class="support_heading">
                        <h3>All Support Tickets</h3>
                        <p>List of ticket open by customers</p>
                    </div> -->
                    <div class="support_table table-responsive">
                        <table id="myTable" class="table table-hover b-t" class="display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </th>
                                    <th>ID</th>
                                    <th>Request Name</th>
                                    <th>Subjects</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Assignee</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="tr1">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </td>
                                    <td>#70</td>
                                    <td>Wiliam Carey</td>
                                    <td>Installion Issues</td>
                                    <td>Open</td>
                                    <td>High</td>
                                    <td class="avatar">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar1.png"
                                                        alt="avatar1.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar2.png"
                                                        alt="avatar2.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar3.png"
                                                        alt="avatar3.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar4.png"
                                                        alt="avatar4.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>23/11/2021</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-whatever="@mdo" href="#">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2"></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="tr2">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </td>
                                    <td>#31</td>
                                    <td>Wiliam Carey</td>
                                    <td>Installion Issues</td>
                                    <td>Open</td>
                                    <td>High</td>
                                    <td class="avatar">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar1.png"
                                                        alt="avatar1.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar2.png"
                                                        alt="avatar2.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar3.png"
                                                        alt="avatar3.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar4.png"
                                                        alt="avatar4.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>23/11/2021</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-whatever="@mdo" href=" #">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2"></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="tr3">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </td>
                                    <td>#39</td>
                                    <td>Wiliam Carey</td>
                                    <td>Installion Issues</td>
                                    <td>Open</td>
                                    <td>High</td>
                                    <td class="avatar">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar1.png"
                                                        alt="avatar1.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar2.png"
                                                        alt="avatar2.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar3.png"
                                                        alt="avatar3.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar4.png"
                                                        alt="avatar4.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>24/11/2021</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-whatever="@mdo" href=" #">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2"></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="tr4">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </td>
                                    <td>#09</td>
                                    <td>Wiliam Carey</td>
                                    <td>Installion Issues</td>
                                    <td>Close</td>
                                    <td>Low</td>
                                    <td class="avatar">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar1.png"
                                                        alt="avatar1.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar2.png"
                                                        alt="avatar2.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar3.png"
                                                        alt="avatar3.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar4.png"
                                                        alt="avatar4.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>25/11/2021</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-whatever="@mdo" href=" #">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2"></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="tr4">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </td>
                                    <td>#11</td>
                                    <td>Wiliam Carey</td>
                                    <td>Installion Issues</td>
                                    <td>Open</td>
                                    <td>Medium</td>
                                    <td class="avatar">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar1.png"
                                                        alt="avatar1.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar2.png"
                                                        alt="avatar2.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar3.png"
                                                        alt="avatar3.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar4.png"
                                                        alt="avatar4.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>26/11/2021</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-whatever="@mdo" href=" #">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2"></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="tr4">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </td>
                                    <td>#03</td>
                                    <td>Wiliam Carey</td>
                                    <td>Installion Issues</td>
                                    <td>Close</td>
                                    <td>High</td>
                                    <td class="avatar">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar1.png"
                                                        alt="avatar1.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar2.png"
                                                        alt="avatar2.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar3.png"
                                                        alt="avatar3.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar4.png"
                                                        alt="avatar4.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>23/11/2021</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-whatever="@mdo" href=" #">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2"></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="tr4">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </td>
                                    <td>#10</td>
                                    <td>Wiliam Carey</td>
                                    <td>Installion Issues</td>
                                    <td>Open</td>
                                    <td>High</td>
                                    <td class="avatar">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar1.png"
                                                        alt="avatar1.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar2.png"
                                                        alt="avatar2.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar3.png"
                                                        alt="avatar3.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar4.png"
                                                        alt="avatar4.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>23/11/2021</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-whatever="@mdo" href=" #">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2"></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="tr4">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    </td>
                                    <td>#06</td>
                                    <td>Wiliam Carey</td>
                                    <td>Installion Issues</td>
                                    <td>Open</td>
                                    <td>High</td>
                                    <td class="avatar">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar1.png"
                                                        alt="avatar1.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar2.png"
                                                        alt="avatar2.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar3.png"
                                                        alt="avatar3.png">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/avatar4.png"
                                                        alt="avatar4.png">
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>23/11/2021</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-whatever="@mdo" href="#">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2"></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2"></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2" href="#">
                                                        <span><i class="fa-solid fa-trash me-2"></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection