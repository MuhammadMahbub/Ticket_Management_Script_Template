@extends('layouts.app_backend')

@section('content')
<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE USER=====-->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Team Title</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Upload Team Image</label>
                            <input type="file" class="form-control" id="message-text"></input>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Select Memeber</label>
                            <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
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
    <div class="team_header d-flex justify-content-between mt-3">
        <div class="team_header__left">
            <h3>Team</h3>
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" data-bs-target="#createModal" data-bs-whatever="@mdo">
                <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                Create Team
            </button>
        </div>
    </div>
    <!--==========Team Card==========-->

    <!--=====TEAM PAGE MODAL=====-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Search People</label>
                            <!-- <input type="text" class="form-control" id="recipient-name"> -->
                            <select class="js-example-basic-multiple form-select w-100" name="states[]"
                                multiple="multiple">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
                <div class="modal-footer_content p-3">
                    <ul>
                        <li>
                            <a style="text-decoration: none;" href="#">
                                <span class="me-2"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/modal.png"
                                        alt="modal.png"></span>
                                Shamim Al Hasan
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <a style="text-decoration: none;" href="#">
                                    <span class="me-2"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/modal.png"
                                            alt="modal.png"></span>
                                    Shamim Al Hasan
                                </a>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <a style="text-decoration: none;" href="#">
                                    <span class="me-2"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/modal.png"
                                            alt="modal.png"></span>
                                    Shamim Al Hasan
                                </a>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="team_card mb-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team_card__start bg-white p-3 rounded mt-3">
                    <div class="team_card__header d-flex justify-content-between align-items-center">
                        <div class="team_card__header__left">
                            <span class="me-2">
                                <img src="{{ asset('dashboard_assets/assets') }}/images/avatar/team.png" alt="team.png">
                            </span>
                            <p>Web Development</p>
                        </div>
                        <div class="team_card__header__right">
                            <div class="dropdown team_card__header__right__elipsis_btn">
                                <button class="btn bg-transparent dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-pen-to-square me-2"></i></span>
                                            Edit
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <span><i class="fa-solid fa-trash me-2"></i></span>
                                            Delete
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team_card__avatar">
                        <ul>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar.png"
                                        alt="avatar.png"></a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar2.png" alt="avatar2.png">
                                </a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar3.png"
                                        alt="avatar3.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar4.png"
                                        alt="avatar4.png"></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('dashboard_assets/assets') }}/images/team_page/avatar5.png"
                                        alt="avatar5.png"></a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="team_card__ticket d-flex justify-content-between mt-4 mb-3 align-items-center">
                        <div class="team_card__ticket__left">
                            <p><span><i class="fa-solid fa-circle-check"></i></span>
                                Closed Ticket : 4500</p>
                        </div>
                        <div class="team_card__ticket__right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <i style="cursor: pointer;" class="fa-solid fa-square-plus"></i>
                        </div>
                    </div>

                    <div class="team_card__progree">
                        <div class="team_card__progress_heading d-flex justify-content-between mb-3">
                            <div class="team_card__progress_heading__left">
                                <p>Success Rate</p>
                            </div>
                            <div class="team_card__progress_heading__right">
                                <p>80%</p>
                            </div>
                        </div>
                        <div class="team_card__progress__bar">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- other content -->
</div>
@endsection