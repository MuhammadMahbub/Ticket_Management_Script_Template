<style>

:root {
    --main-bg-color: #4627960d;
    /* --second-bg-color: #34DDAA; */
    
    --main-text-color: #6c7bff;
    --second-text-color: #bbbec5;
    --second-bg-color: #c1efde;
    --primary-font: "Inter", sans-serif;
    --secondary-font: "Roboto", sans-serif;
    --third-font: "Manrope", sans-serif;
    --darkColor: #212529;
    --theme-color: {{ colorSettings()->theme_color }};
}

body {
    font-family: var(--secondary-font);
}

.pointer {
    cursor: pointer;
}

.primary-text {
    color: var(--main-text-color);
}

.second-text {
    color: #414142;
    font-family: var(--secondary-font);
}

.secondary-bg {
    background-color: var(--second-bg-color);
}

.rounded-full {
    border-radius: 100%;
}

#wrapper {
    overflow-x: hidden;
    /* background-image: linear-gradient(to right,
      #baf3d7,
      #c2f5de,
      #cbf7e4,
      #d4f8ea,
      #ddfaef); */
}

#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -15rem;
    -webkit-transition: margin 0.25s ease-out;
    -moz-transition: margin 0.25s ease-out;
    -o-transition: margin 0.25s ease-out;
    transition: margin 0.25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
    width: 15rem;
}

#page-content-wrapper {
    min-width: 100vw;
    background-color: var(--main-bg-color);
}

#wrapper.toggled #sidebar-wrapper {
    margin-left: 0;
}

#menu-toggle {
    cursor: pointer;
}

.navbar{
    background-color: var(--theme-color);
}

.navbar .dropdown-toggle::after {
    content: none;
}

.navbar .btn-outline-secondary {
    color: #000000 !important;
}

.navbar .btn-outline-secondary:hover {
    background-color: transparent !important;
    color: #000000 !important;
}

.navbar .btn-check:active + .btn-outline-secondary:focus,
.btn-check:checked + .btn-outline-secondary:focus,
.btn-outline-secondary.active:focus,
.btn-outline-secondary.dropdown-toggle.show:focus,
.btn-outline-secondary:active:focus {
    box-shadow: none;
}

.bell_icon i {
    font-size: 17px;
}

.list-group-item {
    border: none;
    padding: 10px 30px;
}

.list-group-item.active {
    background-color: #f0f2ff;
    color: var(--main-text-color);
    font-weight: bold;
    border: none;
}

.flag-icon img {
    width: 15px;
    height: 15px;
    border-radius: 50%;
}

@media (min-width: 768px) {
    .icon {
        display: none;
    }

    #sidebar-wrapper {
        margin-left: 0;
    }

    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
    }
}

.cards__common {
    width: 48px;
    height: 48px;
    background-color: red;
    padding: 10px;
}

.cards {
    height: 74px;
}

.cards p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px !important;
    line-height: 28px;
    color: #7b7f90;
    margin: 0;
    padding: 0;
}

.cards h3 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 700;
    font-size: 20px !important;
    line-height: 28px;
    color: #070707;
}

.cards__bg1 {
    background-color: #34ddaa;
}

.cards__bg2 {
    background-color: #fcb045;
}

.cards__bg3 {
    background-color: #cd84f0;
}

.cards__bg4 {
    background-color: #fd967b;
}

.list-group .active {
    background: #f0f2ff !important;
    border-left: 3px solid #6c7bff;
}

/*==========Ticket & Issue part==========*/

.chart__left__heading h4 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 27px;
    color: #070707;
    margin-left: 14px;
    margin-bottom: 0;
}

.chart__right__heading h4 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 22px;
    margin: 0;
}

.map__map_heading p {
    font-family: var(--secondary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 28px;
    color: #444444;
}

.map__map_heading h5 {
    font-family: var(--secondary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 30px;
    line-height: 28px;
    color: #6c7bff;
}

.cmn_style p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 28px;
    color: #7b7f90;
}

.cmn_style h3 {
    font-family: var(--secondary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 22px;
    line-height: 28px;
}

.customerTicket_table th,
td
{
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 13px;
    line-height: 17px;
    color: #070707;
}

.customerTicket_table thead th {
    color: #ffffff !important;
}
/*==========Map Part==========*/

.customerTicket__tickets_heading_dropdown .heading h3 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;
    color: #070707;
}

.map__map_heading {
    border-bottom: 2px dashed #f1f1f1;
}

.divider {
    position: relative;
    border-right: 2px dashed #f1f1f1;
}

/*==========All Support Tickets==========*/
.support_heading h3 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 700;
    font-size: 24px;
    line-height: 29px;
    color: #070707;
}

.support_heading p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
    color: #7b7f90;
}

.avatar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.avatar ul li {
    display: inline-block;
}

.modal_btn {
    background-color: #ebeffb !important;
    padding: 6px;
    border-radius: 5px;
}

.modal_btn__ind {
    padding: 0px 20px;
    border: 1px solid #6c7bff;
    border-radius: 5px;
    background-color: #6c7bff;
    color: #ffffff;
}

.modal_btn_team {
    color: #6c7bff;
}

.modal_save_btn {
    background-color: #6c7bff;
    padding: 0 32px;
    display: inline-block;
    color: #ffffff;
}

.modal_close_btn {
    background-color: #eaeaea;
    padding: 0 20px;
}

.support_table .dropdown-toggle::after {
    content: none;
}

.support_table table tr {
    background-color: #ffffff;
    /* border-radius: 10px; */
    /* border-spacing: 10px; */
}

.table {
    border-collapse: separate;
    border-spacing: 0 10px;
    /* border-radius: 10px; */
}

/* .support_table td:first-child,
.support_table th:first-child {
    border-radius: 10px 0 0 10px;
} */

/* .support_table td:last-child,
.support_table th:last-child {
    border-radius: 0 10px 10px 0;
} */

tbody,
td,
tfoot,
th,
thead,
tr {
    border-bottom: 1px solid #efefef;
}

.table thead tr th {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 13px;
    line-height: 19px;
    color: #535870;
}

/*===========Dashboard Footer==========*/
.page-item a {
    width: 33px;
    height: 33px;
    border-radius: 50%;
    text-align: center;
    line-height: 17px;
    margin: 0 10px;
}

.support .support_table #myTable_wrapper .table.dataTable {
    border-spacing: 0 10px;
}

/*==================================================================
                          TEAM PAGE DESIGN
====================================================================*/

/*=========TEAM HEADING==========*/
.team_header__right button {
    padding: 5px 20px;
    background-color: var(--theme-color) !important;
    border: 1px solid var(--theme-color) !important;
    border-radius: 8px;
    color: #ffffff;
}

.team_card__header__right__elipsis_btn .dropdown-toggle::after {
    content: none;
}

/*===========Team Card==========*/
.team_card__avatar ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.team_card__avatar ul li {
    display: inline-block;
}

.team_card__avatar ul li a {
    transition: all linear 0.3s;
    width: 22px;
    height: 22px;
}

.team_card__avatar ul li a img {
    transition: all linear 0.2s;
}

.team_card__avatar ul li a img:hover {
    transform: translateY(-4px) scale(1.5);
}

.team_card__avatar ul li:not(:first-child) {
    margin-left: -10px;
}

.team_card__progress__bar .progress-bar {
    background-color: var(--second-bg-color);
    opacity: 1;
}

.team_card__progress__bar .progress {
    border-radius: 32px;
}

.team_card__ticket__left span {
    color: var(--second-bg-color);
}

.team_card__header__left p {
    font-family: var(--primary-font);
    display: inline-block;
    font-style: normal;
    font-weight: 500;
    font-size: 22px;
    line-height: 27px;
    color: #4f546f;
}

.team_card__ticket__left p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
    color: #7b7f90;
    margin: 0;
}

.team_card__ticket__right .fa-square-plus {
    font-size: 32px;
    color: var(--main-text-color);
}

.team_card__progress_heading p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 15px;
    margin-bottom: 0;
}

.team_card__progress_heading__right p {
    color: #28cc80;
}

.select2-search .select2-search--inline textarea {
    width: 100% !important;
}

.relply-section {
    border: 2px solid #ddd;
    padding: 7px 25px;
    margin: 15px 23px;
    box-shadow: 4px 0px 1px 0px;
}

.reply-text-area {
    border: 2px solid #ddd;
    padding: 7px 25px;
    box-shadow: 3px 4px 4px 0px;
}
.fruit {
    background-color: red !important;
}

.select2-container {
    display: block;
    z-index: 999999;
}

.select2-container--open .select2-dropdown--below {
    z-index: 9999;
}

.modal-footer_content ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.select2-container--default
    .select2-selection--multiple
    .select2-selection__choice {
    background-color: var(--main-text-color);
    color: #ffffff;
}

/* .select2-container--default .select2-selection--multiple .select2-selection__choice {
  padding-right: 20px;
  padding-left: 0;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
  right: 0 !important;
} */
.select2-container--default
    .select2-selection--multiple
    .select2-selection__choice {
    padding-right: 20px !important;
    padding-left: 0;
}

.select2-container--default
    .select2-selection--multiple
    .select2-selection__choice__remove {
    right: 0;
    left: 64px;
}

/*=======================================================================
                            TICKETS PART
=========================================================================*/

.tickets_header_btn {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.user_list .dropdown-toggle::after {
    content: none;
}

.user_list table thead {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.user_list table {
    border-collapse: separate;
    /* border-radius: 15px; */
    background-color: #ffffff;
    /* border-spacing: 0 10px; */
}

.user_list thead tr th {
    color: #ffffff;
}

.user-page table {
    border-spacing: 0 !important;
}

/* .user-page table thead tr th:first-child {
    border-radius: 15px 0 0 0 !important;
} */

/* .user-page table thead tr th:last-child {
    border-radius: 0 15px 0 0 !important;
} */

/* .user-page table tbody tr:last-child th {
    border-radius: 0 0 0 15px !important;
} */

/* .user-page table tbody tr:last-child td:last-child {
    border-radius: 0 0 15px 0 !important;
} */

.table tbody tr .dropdown .btn {
    padding: 0 4px;
    border: 0;
}

.dataTables_filter {
    margin-bottom: 10px;
}

.table.dataTable.no-footer {
    border-bottom: 0;
}

/* .user_list table th,
td {
  border-top: 1px solid #BEBEBE;
} */

/*============================================================
                        ACCESS AND PERMISSION
==============================================================*/
.access_and_permission_heading h3 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 700;
    font-size: 28px;
    line-height: 28px;
    color: #070707;
}

.access_and_permission_heading p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 30px;
    color: #7b7f90;
}

.permission_btn {
    background-color: var(--main-text-color);
    border: 1px solid var(--main-text-color);
    border-radius: 5px;
    padding: 3px 10px;
    color: #ffffff;
}

/*=======================================================
                  ACCESS AND PERMISSION
=========================================================*/

.form-switch {
    padding: 0;
}

.form-check {
    padding: 0;
}

.permission_switch {
    cursor: pointer;
}

/*================================================================================
                                  CURRENT TICKETS
==================================================================================*/

.current_ticket__left__btn a {
    background-color: #ffffff;
    margin-right: 5px;
    margin-top: 6px;
    margin-bottom: 6px;
}

@media only screen and (max-width: 480px) {
    .current_ticket__left__btn a {
        width: 48%;
    }

    .top__menubar--right--btn {
        width: 48%;
    }
}

@media only screen and (max-width: 380px) {
    .current_ticket__left__btn a {
        width: 100%;
    }
    .top__menubar--right--btn {
        width: 100%;
        margin-top: 6px;
    }
}

.current_ticket__right {
    margin: 6px 5px;
}

.top__menubar--right--btn {
    background-color: var(--theme-color) !important; 
    color: #ffffff;
}

.current_ticket__right__btn .dropdown .filter {
    background-color: var(--main-text-color);
    color: #ffffff;
    border-radius: 5px;
}

.current_ticket__right__btn__div .btn:hover {
    color: #ffffff;
}

.current_ticket__left__btn .active {
    background-color: var(--theme-color) !important;
    color: #ffffff;
}

.current_tickets_heading__left h3 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 29px;
    color: #070707;
}

.current_ticket__right__btn .dropdown-toggle::after {
    content: none;
}

.current_ticket__right__btn .dropdown-menu {
    min-width: 13.438rem;
}

.dropdown .filter_btn .btn:last-child {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.dropdown .filter_btn .btn:first-child {
    background-color: #eaeaea;
}

.create_ticket_btn {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.avatar ul li a {
    width: 22px;
    height: 22px;
}

.avatar ul li a img {
    transition: all linear 0.2s;
}

.avatar ul li a img:hover {
    transform: translateY(-4px) scale(1.5);
}

/*==================================================================
                              Inbox Part
====================================================================*/
.bug_fixing_inbox_start__msg__rec_msg {
    margin-top: 10px;
}

.bug_fixing_inbox_start__msg__rec_msg .message {
    background-color: #f4f4f4;
    padding: 12px;
    border-radius: 15px 15px 15px 0;
}

.bug_fixing_inbox_start__msg__rec_msg__text__two {
    border-radius: 0 15px 15px 15px !important;
    margin-top: 5px;
}

.bug_fixing_inbox_start__msg__rec_msg__img img {
    width: 33px;
    height: 33px;
    border-radius: 50%;
    margin-right: 10px;
}

.bug_fixing_inbox_start__msg__outgoing_msg__new {
    background-color: #6c7bff;
    padding: 12px;
    color: #ffffff;
    margin-top: 10px;
}

.border_down {
    border-radius: 15px 15px 15px 0;
}

.bug_fixing_inbox_start__msg__rec_msg__text__two img {
    width: 90px;
    height: 67px;
}

.bug_fixing_inbox_start__msg__rec_msg__text__two small {
    display: block;
}

.inbox_left_site_inbox__sub p,
.inbox_left_site_inbox__priority_type p,
.inbox_left_site_inbox__id p {
    margin: 0;
    font-family: var(--primary-font);
    font-weight: 500;
    font-size: 14px;
    line-height: 28px;
    color: #7b7f90;
}

.inbox_left_site_inbox__user span {
    font-family: var(--primary-font);
    font-weight: 500;
    font-size: 14px;
    line-height: 28px;
    color: #7b7f90;
}

.bug_fixing_inbox_start__msg__rec_msg p,
.bug_fixing_inbox_start__msg__outgoing_msg p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 28px;
    color: #070707;
}

.bug_fixing_inbox_start__msg__rec_msg small,
.bug_fixing_inbox_start__msg__outgoing_msg small {
    font-family: "Inter";
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 15px;
}

.bug_fixing_inbox_start__msg__outgoing_msg p {
    color: #ffffff;
}

.msg_footer .fa-paperclip,
.fa-face-smile,
.fa-paper-plane {
    cursor: pointer;
}

.msg_footer .fa-paper-plane {
    background-color: var(--main-text-color);
    padding: 12px;
    border-radius: 5px;
    color: #ffffff;
}

.msg_footer textarea {
    resize: none;
}

.input-file {
    display: none;
}

.inbox_right_side {
    min-height: 100vh;
    /* max-height: 100%; */
}

.inbox_right_btn_filed {
    background-color: var(--main-text-color);
    color: #ffffff;
    min-width: 50%;
    border-radius: 0;
}

.inbox_right_btn_unfield {
    min-width: 50%;
    border-radius: 0;
    background-color: #f4f4f4;
}

.list-group .badge {
    background-color: var(--main-text-color);
    border-radius: 50%;
}

/*=========================================================================
                                  Profile Page
===========================================================================*/
.profile_heading__navigation a {
    text-decoration: none;
    margin-right: 20px;
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 28px;
    color: #070707;
    padding: 10px 0;
}

.profile_heading__navigation .active {
    color: var(--theme-color) !important;
    border-bottom: 2px solid var(--theme-color) !important;
}

.profile_banner_part_banner {
    border-radius: 15px 15px 0px 0px;
}

.profile_banner_part_banner {
    height: 192px;
}

.profile_banner_part_banner img {
    object-fit: cover;
}

.profile_banner_part__profile_img {
    margin-top: -125px;
}

.profile_banner_part__profile_img__image {
    width: 198px;
    height: 198px;
    border-radius: 50%;
    margin: 0 auto;
}

.profile_banner_part__profile_img__info h3 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 32px;
    line-height: 28px;
    color: var(--main-text-color);
    margin-top: 25px;
}

.profile_banner_part__profile_img__info p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 28px;
    color: #7b7f90;
}

.profile_banner_part__profile_img__info {
    position: relative;
}

.edit_icon {
    position: absolute;
    top: -95px;
    right: -10px;
}

.profile_heading_style h3 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 700;
    font-size: 22px;
    line-height: 28px;
    color: #070707;
}

.contact_info_detail table td {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 28px;
    color: #7b7f90;
}

.contact_info_detail table .colors {
    color: #070707;
}

.education_info,
.contact_info {
    position: relative;
}

.edit_icon2 {
    position: absolute;
    right: 0;
    top: 0;
}

.education_info__detail__details h5 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 28px;
    color: #070707;
    margin: 0;
}

.education_info__detail__details p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 28px;
    color: #7b7f90;
    margin: 0;
}

.edit_icon3 {
    position: absolute;
    right: 15px;
    top: 20px;
}

.modal-header h5 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 700;
    font-size: 22px;
    line-height: 28px;
    color: var(--theme-color) !important;
}

.modal-header {
    border: 0;
}

.modal-footer {
    border: 0;
}

.upload_field {
    background-color: transparent;
    border: 1px solid #ced4da;
}

.upload_field p,
.upload_field2 p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 28px;
    color: #acacac;
}

.file-hidden,
.file-hidden2 {
    display: none;
}

.modal-body label {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 28px;
    color: #444444;
}

.primary_information_modal__btn {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.select2-dropdown span input {
    display: none;
}

.js-example-basic-single {
    padding: 15px;
}

.education_info .addMore {
    background-color: #e3e6ff;
    display: inline-block;
    border-radius: 5px;
    color: var(--main-text-color);
}

.form-control:focus {
    box-shadow: none;
}

.btn-check:focus + .btn,
.btn:focus {
    box-shadow: none;
}

/*=============================================================
                        Priorities Page
===============================================================*/

.priorities_font h3 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 28px;
    color: #070707;
}

.priorities_content p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 28px;
    color: #070707;
}

/*==================================================================
                          Create Password Page
====================================================================*/
.create_password__headimg {
    max-width: 400px;
    margin: 0 auto;
    text-align: center;
}

.create_password__headimg h3 {
    font-family: var(--third-font);
    font-style: normal;
    font-weight: 700;
    font-size: 22px;
    line-height: 28px;
    color: #6c7bff;
}

.create_password__headimg p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
    color: #707070;
}

.create_password_content__inputs__input_field {
    max-width: 444px;
    margin: 0 auto;
}

.password_form_btn {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.password_form_btn:hover {
    color: #ffffff;
}

.create_password_content__inputs__input_field label {
    font-family: var(--third-font);
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 28px;
    color: #444444;
}

.create_password_content__inputs__input_field ::placeholder {
    font-family: var(--third-font);
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 28px;
    color: #acacac;
}

/*=====================================================================================
                                      Agent Dashboard Page
=======================================================================================*/

.recent_msg_part__start__details__header h5 {
    font-family: var(--third-font);
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 22px;
    color: #070707;
    margin: 0;
}

.recent_msg_part__start__details .recent_msg_part__start__details_section {
    font-family: var(--secondary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 14px;
    color: #070707;
    margin: 0;
}

.recent_msg_part__start__details p {
    font-family: var(--third-font);
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 26px;
    color: #7b7f90;
}

.recent_msg_part__start__img__sender__profile {
    padding: 3px;
    border: 1px solid var(--main-text-color);
    border-radius: 50%;
}

.recent_msg_part__start__img__sender__profile img {
    width: 37px;
    height: 37px;
    border-radius: 50%;
}

.recent_msg_part__heading {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 700;
    font-size: 18px !important;
    line-height: 22px;
    color: #070707;
}

.recent_msg_part__start__details__header small {
    font-family: var(--third-font);
    font-style: normal;
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
    color: #7b7f90;
}

.dropdown_list {
    max-height: 400px;
    overflow: auto;
}

.dropdown_scroll {
    max-height: 400px;
}

/*=======================================================================
                              Agent Page
=========================================================================*/
.agent .agent-filter {
    background-color: var(--main-text-color) !important;
    color: #ffffff;
    margin-left: 10px;
}

.agent-btn-top button {
    color: var(--main-text-color);
}

.customer_ticket_right button {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.customer_ticket_right button:hover {
    color: #ffffff;
}

/*============================================================================
                                Customer Dashboard
==============================================================================*/
.user_msg_box {
    border-radius: 21px;
}

.user_msg_box__heading__info h4 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 22px;
    line-height: 27px;
    color: #070707;
    margin: 0;
}

.user_msg_box__heading__info p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    margin: 0;
    color: #7b7f90;
}

.user_msg_box__heading__details {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 30px;
    color: #7b7f90;
}

.request_ticket_modal textarea {
    resize: none;
}

.request_tickets_btn {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.request_tickets_btn:hover {
    color: #ffffff;
}

/*=================================================================
                          Customer Chat
===================================================================*/

.customer_chat_search_box,
.customer_chat_search_box input {
    background-color: #f4f4f4;
}

.customer_chat_search_box .form-control:focus {
    background-color: #f4f4f4;
}

.customer_chat_colored {
    border-radius: 5px 0 0 5px;
}

.customer_chat_colored:hover {
    color: #ffffff;
}

.customer_chat_trans {
    border-radius: 0 5px 5px 0;
}

.customer_chat_border {
    border-right: 1px solid #f3f5fb;
}

.customer_msg_name span {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 28px;
    color: #070707;
    opacity: 0.7;
}

.customer_chat_heading_btn {
    background-color: #f4f4f4;
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 17px;
    text-align: center;
    color: #070707;
}

.msg-footer__content p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 30px;
    text-align: center;
    color: #7b7f90;
}

/*==============================================================
                          Change Password
================================================================*/

.change_password_btn {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.change_password_btn:hover {
    color: #ffffff;
}

/*================================================================================
                                Login Page
==================================================================================*/

.login_left {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.login_left h4 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 700;
    font-size: 23px;
    line-height: 28px;
    text-align: center;
    margin-top: 20px;
}

.login_left p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 28px;
}

.login-right h4 {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 500;
    font-size: 23px;
    line-height: 28px;
    color: #070707;
}

.login-right p {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 28px;
    color: #7b7f90;
}

.remfor label {
    padding: 0;
}

.login-btn {
    background-color: var(--main-text-color);
    color: #ffffff;
}

.login-btn:hover {
    color: #ffffff;
}

.timeline::after {
    content: "-----------------------";
}

.timeline::before {
    content: "------------------------";
}

.loginWithGoogle {
    background-color: #ffffff;
    box-shadow: 0px 2.54167px 25.4167px rgba(146, 146, 146, 0.15);
    border-radius: 12px;
}

.dont_account,
.forget_pss {
    text-align: center;
    display: block;
    font-family: var(--secondary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 28px;
    text-decoration: none;
    color: #7b7f90;
}

@media (min-width: 768px) {
    .gradient-form {
        height: 100vh !important;
    }
}

@media (min-width: 769px) {
    .gradient-custom-2 {
        border-top-right-radius: 0.3rem;
        border-bottom-right-radius: 0.3rem;
    }
}

.modal-footer_content ul li a {
    font-family: var(--primary-font);
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 30px;
    color: #7b7f90;
}

.form-select:focus {
    box-shadow: none;
}

/*========================================================================
                                Data Tables Pagination
==========================================================================*/

.dataTables_paginate .current {
    background: var(--theme-color) !important;
    color: #ffffff !important;
    border-radius: 50% !important;
}

.paginate_button {
    background: #ffffff !important;
    border-radius: 50% !important;
    margin: 0 5px;
}

.previous {
    background: transparent !important;
}

.next {
    background: transparent !important;
}

table.dataTable thead th,
table.dataTable thead td {
    border-bottom: 0;
}
.modal_header {
    box-shadow: 0px 0px 1px 0px;
}
.table_header_show {
    border-right: 2px solid #ddd !important;
}

.dataTables_wrapper .dataTables_filter input {
    background-color: white !important;
}
.dataTables_wrapper .dataTables_length select {
    background-color: white;
}
.dataTables_wrapper {
    margin-bottom: 100px;
    height: auto;
}

.table {
    border-collapse: separate;
    border-radius: 15px;
    background-color: #ffffff;
}
.table > thead {
    background-color: var(--theme-color) !important;
    border-radius: 25px;
    border-spacing: 10px;
    color: white !important;
}
.dataTables_infoP {
    margin-top: 10px !important;
}

.dataTables_info {
    color: #7b7f90 !important;
}

.dataTables_paginate .previous {
    color: #7b7f90 !important;
}

.dataTables_paginate {
    margin-top: 10px !important;
}

.dataTables_paginate span a {
    color: white !important;
    padding: 1px 9px !important;
}

.bg-white {
    background-color: none;
}
.btn-close {
    background-color: var(--theme-color) !important;
    color: #ffffff !important;
}
.my-3 {
    margin-top: 4px !important;
}

.btn-info {
    color: #fff;
    background-color: #198754;
    border-color: #198754;
}

#sidebar-wrapper .sidebar-heading {
    padding: 14px 0px;
    margin-left: -55px;
}

/* label{
    font-size: 16px !important;
} */

.offcanvas-body {
    padding: 0rem 1rem !important;
}

/* ===========================================================================
                              New CSS
==============================================================================*/

.tickets-card-icons {
    font-size: 20px;
}

.left-icon {
    width: 48px;
    height: 48px;
    text-align: center;
    border-radius: 50%;
    line-height: 48px;
}

.purple-clr {
    color: var(--theme-color) !important;
    background-color: #51329d14;
}

/* .pest-clr {
    color: #00cfe8 !important;
    background-color: rgba(0, 207, 232, 0.2);
} */

.chart_left_heading_right--select option {
    font-size: 20px;
}

.dataTables_filter label {
    font-size: 0;
}

.dataTables_filter input {
    font-size: 14px;
}

table {
    border-radius: 0 !important;
}

.chart-heading__option option {
    font-size: 20px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current,
.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #ffffff !important;
}

.password-wrapper {
    position: relative;
    width: 100%;
    margin-top: 5px;
    margin-bottom: 10px;
}
.password-wrapper__input {
    width: 100% !important;
    margin: 0 !important;
}
.password-wrapper__toggler {
    position: absolute;
    top: 0;
    right: 6px;
    height: 100%;
    background: transparent;
    border: 0;
    color: #abb2b9;
}

.timeline {
    text-align: center;
}

.user-page table thead tr th {
    white-space: nowrap;
}

.table-hover > tbody > tr:hover {
    background-color: rgba(0, 0, 0, 0.045) !important;
}

.congratulations {
    background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
    position: relative;
}

.congrates_img-left {
    position: absolute;
    top: 0;
    left: 0;
    width: 200px;
    opacity: 96;
}

.congrates_img-right {
    position: absolute;
    top: 0;
    right: 0;
    width: 175px;
    opacity: 96;
}

.congrates_avatar {
    display: flex;
    justify-content: center;
    z-index: 999;
    position: relative;
}
.congrates_avatar-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 70px;
    height: 70px;
    background-color: red;
    background: rgba(115, 103, 240, 1);
    border-radius: 50%;
}

.congrates__icon {
    font-size: 35px;
    color: #ffffff;
}

.card-text {
    color: #ffffff;
}

.card-text__heading {
    margin: 12px 0;
}

@media only screen and (max-width:991.9px){
    .inbox_wrapper .row{
        flex-direction: column-reverse !important;
    }


    .inbox_left_site_status_input .row{
        flex-direction: column !important;
    }

    .inbox_left_site_status_input label{
        display: inline-block;
        margin-top: 8px;
    }

    .inbox_right_side{
        height: initial !important;
        min-height: initial !important;
    }
    .color_setting_center{
        width: 100% !important;
    }
}
a{
    color: var(--theme-color);
}

.btn-success {
    color: #fff;
    background-color: var(--theme-color) !important;
    border-color: var(--theme-color) !important;
}

.btn-primary {
    color: #fff;
    background-color: var(--theme-color) !important;
    border-color: var(--theme-color) !important;
}

.btn-danger {
    color: #fff;
    /* background-color: var(--theme-color) !important; */
    /* border-color: var(--theme-color) !important; */
}
.permission_class{
    background: var(--theme-color) !important;
    color: white;
}
.accordion-button:not(.collapsed) {
    color: #fff !important;
    background-color: #e7f1ff;
    box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
}

.form-check-input:checked {
    background-color: var(--theme-color) !important;
    border-color: var(--theme-color) !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    color: var(--theme-color) !important;
}

.primary-text {
    color: var(--theme-color) !important;
}

.list-group-item.active {
    color: var(--theme-color) !important;

}
.main-logo{
    width: 180px;
    height: 70px;
    object-fit: contain;
}

.top__menubar--left{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.top__menubar--left .btn{
    padding: .375rem 2.3rem !important;
}

@media only screen and (max-width:1091.9px){
    .top__menubar--left{
        justify-content: initial;
    }

    .top__menubar--left .btn{
        margin-right: 5px !important;
    }
}
.mr-right{
    margin-right: 10px !important;
}
.tick_sub_problem{
    /* font-weight: bold;  */
    font-style:italic;
    font-size: 17px;
    margin-bottom: 7px;
    color: var(--theme-color) !important;
}

.dropDown__inner{
    display: flex;
    align-items: center
}
.mark_read_btn{
    margin: 15px 30px !important;
}
.mark_read_btn_danger{
    background: #f5bb19 !important;
    border: none;
}
.mark_read_btn_info{
    background: var(--theme-color) !important;
}
.read_btn{
    margin-top: 50px !important;
}
.mark_read_icon{
    font-size: 19px;
    padding: 0px 0px 0px 10px;
    color: var(--theme-color) !important;
}

.dropdown-scroll{
    max-height: 500px;
    overflow-y: auto;
}
.mark__as__read__btn{
    background: var(--theme-color) !important;
}

.notification-list__item{
    background:#ddd;
    display: flex;
    align-items: center;
}


.notification-list__item.active{
    background:#f5bb19
}

.notification-list{
    margin-top: 25px;
}

.notification-list__item__avatar{
    width: 40px;
    height: 40px;
}

.notification-list__item__user-name{
    font-weight: 700;
}

.notification-list__item__link{
    color: #212529 !important;
    text-decoration: none;
    padding: 1.5rem;
    flex-grow: 1;
}

.notification-list__item__action{
    padding: 1.5rem;
}

.dropdown-toggle--hide-icon::after{
    display: none;
}
.load__more__btn{
    background: var(--theme-color) !important;
    padding: 10px 20px;
    color: white;
    border-radius: 7px;
    text-decoration: none;
    cursor: pointer;
    /* box-shadow: 0px 3px 5px 0px #4873d5; */
}

.load__more__btn:hover{
    background: var(--theme-color) !important;
    /* box-shadow: 0px 3px 5px 0px #4873d5; */
}

table a{
    text-decoration: none;
}

.clear_all_admin_notification{
    background: rgb(184, 31, 31) !important;
}




</style>