@extends('layouts.app_backend')

@section('content')
<div class="container-fluid px-4 conatiners">
    <!--======Modals======-->
    <div class="modals">
        <div class="primary_information_modal">
            <div class="modal fade" id="primary-infoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Your Primary Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label"> Your
                                        Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Name"
                                        id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Upload Photo</label>
                                    <input type="file" class="form-control file-hidden">
                                    <button class="d-block w-100 upload_field rounded form-control">
                                        <div class="content d-flex justify-content-between">
                                            <p class="m-0">Upload Image</p>
                                            <img src="{{ asset('dashboard_assets/assets') }}/images/profile_page/upload.svg"
                                                alt="upload.svg">
                                        </div>
                                    </button>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Cover Photo
                                        (Oprional)</label>
                                    <input type="file" class="form-control file-hidden2">
                                    <button class="d-block w-100 upload_field2 rounded form-control">
                                        <div class="content d-flex justify-content-between">
                                            <p class="m-0">Upload Image</p>
                                            <img src="{{ asset('dashboard_assets/assets') }}/images/profile_page/upload.svg"
                                                alt="upload.svg">
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                class="btn w-100 primary_information_modal__btn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact_information_modal">
            <div class="modal fade" id="contact-infoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contact Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label"> Your
                                        Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Your Phone Number"
                                        id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email"
                                        id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Country</label>
                                    <input type="text" class="form-control" placeholder="Country"
                                        id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Address"
                                        id="recipient-name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                class="btn w-100 primary_information_modal__btn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="education_information_modal">
            <div class="modal fade" id="education-infoModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Education Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">University</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter University Name" id="recipient-name">
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <div class="date_info_from">
                                        <label for="recipient-name" class="col-form-label">Date Of
                                            Attend</label>
                                        <input type="date" class="form-control" placeholder="Email"
                                            id="recipient-name">
                                    </div>
                                    <div class="date_info_to">
                                        <label for="recipient-name" class="col-form-label">To</label>
                                        <input type="date" class="form-control" placeholder="Email"
                                            id="recipient-name">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Degree</label>
                                    <select class="js-example-basic-single" name="state">
                                        <option value="AL">BSC</option>
                                        <option value="WY">MSC</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Department</label>
                                    <input type="text" class="form-control" placeholder="Address"
                                        id="recipient-name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                class="btn w-100 primary_information_modal__btn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========profile heading==========-->
    <div class="profile_heading mt-3">
        <div class="profile_heading__navigation bg-white mt-3 px-3 d-flex flex-wrap rounded">
            <a href="profile.html" class="item active">Profile</a>
            <a href="notification.html" class="item">notification</a>
        </div>
    </div>
    <!--==========Profile Banner==========-->
    <div class="profile_banner_part mt-3 bg-white">
        <div class="profile_banner_part_banner overflow-hidden">
            <img class="h-100 w-100" src="{{ asset('dashboard_assets/assets') }}/images/profile_page/banner.jpg" alt="banner.jpg">
        </div>
        <div class="profile_banner_part__profile_img text-center bg-white p-3">
            <div class="profile_banner_part__profile_img__image">
                <img class="w-100" src="{{ asset('dashboard_assets/assets') }}/images/profile_page/profile.png" alt="profile.png">
            </div>
            <div class="profile_banner_part__profile_img__info">
                <h3>Jubayer Ahmed</h3>
                <p>Graphic Designer</p>
                <div class="edit_icon pointer" data-bs-toggle="modal" data-bs-target="#primary-infoModal"
                    data-bs-whatever="@mdo">
                    <img src="{{ asset('dashboard_assets/assets') }}/images/profile_page/edit-icon.svg" alt="edit-icon.svg">
                </div>
            </div>
        </div>
        <hr class="m-0 p-0">
        <div class="contact_info p-3">
            <div class="contact_info__heading profile_heading_style mt-3">
                <h3>Contact information</h3>
            </div>
            <div class="contact_info_detail">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="colors">Your Phone</td>
                            <td>:</td>
                            <td>+880 1912061482</td>
                        </tr>
                        <tr>
                            <td class="colors">Email</td>
                            <td>:</td>
                            <td>Jubayerkawsar97@gmail.com</td>
                        </tr>
                        <tr>
                            <td class="colors">Counrty</td>
                            <td>:</td>
                            <td>Bangladesh</td>
                        </tr>
                        <tr>
                            <td class="colors">Address</td>
                            <td>:</td>
                            <td>Shympur High School Road, Shympur , Kodomtoli, Dhaka 1204</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="edit_icon2 pointer" data-bs-toggle="modal" data-bs-target="#contact-infoModal"
                data-bs-whatever="@mdo">
                <img src="{{ asset('dashboard_assets/assets') }}/images/profile_page/edit-icon.svg" alt="edit-icon.svg">
            </div>
        </div>
    </div>

    <div class="education_info bg-white mt-3 rounded">
        <div class="education_info__detail p-3">
            <div class="education_info__detail__heading profile_heading_style">
                <h3>Education Information</h3>
            </div>
            <div class="education_info__detail__details">
                <h5>Bsc/Chemistry</h5>
                <p>Northsouth University</p>
                <p>(2016-2021)</p>
            </div>
            <div class="education_info__detail__details mt-3">
                <h5>Intermetiade/Science</h5>
                <p>Shympur High School and Collage</p>
                <p>(2014-2016)</p>
            </div>
        </div>
        <div class="edit_icon3 pointer" data-bs-toggle="modal" data-bs-target="#education-infoModal"
            data-bs-whatever="@mdo">
            <img src="{{ asset('dashboard_assets/assets') }}/images/profile_page/edit-icon.svg" alt="edit-icon.svg">
        </div>
    </div>
</div>
@endsection
