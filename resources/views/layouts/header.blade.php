<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Shelvi Financial Services</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <div class="main-wrapper">
        <div class="header header-one">
            <a href="javascript:void(0);" id="toggle_btn">
                <span class="toggle-bars">
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                </span>
            </a>

            <div class="top-nav-search">
                <form>
                    {{-- <input type="text" class="form-control" placeholder="Search here" /> --}}
                    {{-- <button class="btn" type="submit">
                        <img src="{{ asset('assets/img/icons/search.svg') }}" alt="img" />
                    </button> --}}
                </form>
            </div>

            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav nav-tabs user-menu">
                {{-- <li class="nav-item dropdown has-arrow flag-nav">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                        <img src="{{ asset('assets/img/flags/us1.png') }}" alt height="20" /><span>English</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('assets/img/flags/us.png') }}" alt height="16" /><span>English</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('assets/img/flags/fr.png') }}" alt height="16" /><span>French</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('assets/img/flags/es.png') }}" alt height="16" /><span>Spanish</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('assets/img/flags/de.png') }}" alt height="16" /><span>German</span>
                        </a>
                    </div>
                </li> --}}

                <li class="nav-item has-arrow dropdown-heads">
                    <a href="javascript:void(0);" class="toggle-switch">
                        <i class="fe fe-moon"></i>
                    </a>
                </li>
                <li class="nav-item dropdown flag-nav dropdown-heads">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button">
                        <i class="fe fe-bell"></i>
                        <span class="badge rounded-pill"></span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt
                                                    src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Brian Johnson</span> paid
                                                    the invoice <span class="noti-title">#DF65485</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="profile.html">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt
                                                    src="{{ asset('assets/img/profiles/avatar-03.jpg') }}" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Marie Canales</span> has
                                                    accepted your estimate
                                                    <span class="noti-title">#GTR458789</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-primary-light"><i
                                                        class="far fa-user"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">New user registered</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt
                                                    src="{{ asset('assets/img/profiles/avatar-04.jpg') }}" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Barbara Moore</span>
                                                    declined the invoice
                                                    <span class="noti-title">#RDW026896</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">12 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-info-light"><i
                                                        class="far fa-comment"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">You have received a new message</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">2 days ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="notifications.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item has-arrow dropdown-heads">
                    <a href="javascript:void(0);" class="win-maximize">
                        <i class="fe fe-maximize"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="user-link nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img src="{{ asset('assets/img/logo-small.svg') }}" alt="img"
                                class="profilesidebar" />
                            {{-- <span class="animate-circle"></span> --}}
                        </span>
                        <span class="user-content">
                            <span class="user-details">Admin</span>
                            <span class="user-name">Shelvi Finance</span>
                        </span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilemenu">
                            <div class="subscription-menu">
                                <ul>
                                    <li>
                                        <a class="dropdown-item" href="#">Profile</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="subscription-logout">
                                <ul>
                                    <li class="pb-0">
                                        <a class="dropdown-item" href="{{ url('/') }}">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        @include('layouts.sidebar');
