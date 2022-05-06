<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="Apprenticeship.">
    <meta name="msapplication-tap-highlight" content="no">

    <title>IFindUG - @yield('title')</title>

    {{--<link rel="icon" href="{{ asset('images/android-chrome-512x512.png') }}" sizes="512x512" type="image/png">--}}
    {{--<link rel="icon" href="{{ asset('images/android-chrome-192x192.png') }}" sizes="192x192" type="image/png">--}}
    {{--<link rel="icon" href="{{ asset('images/favicon-16x16.png') }}" sizes="16x16" type="image/png">--}}
    {{--<link rel="icon" href="{{ asset('images/favicon-32x32.png') }}" sizes="32x32" type="image/png">--}}
    {{--<link rel="icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180" type="image/png">--}}
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css_includes')
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/i-find-logo.jpg') }}" style="height: 50px; width: 100px;">
                </a>
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="{{ asset('images/user.png') }}"
                                             alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right">
                                        <input id="user_name" name="user_name" type="hidden" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" />
                                        <input id="user_email" name="user_email" type="hidden" value="{{ Auth::user()->email }}" />
                                        <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">Profile</a>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <button type="button" tabindex="0" class="dropdown-item"
                                                onclick="event.preventDefault(); document.getElementById('logOut').submit();">
                                            Logout
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    {{ Auth::user()->first_name }}
                                </div>
                                <div class="widget-subheading">
                                    {{ Auth::user()->role }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboard</li>
                        <li>
                            <a href="javascript:;">
                                <i class="metismenu-icon pe-7s-bookmarks"></i>
                                Items
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('item.create') }}">
                                        <i class="metismenu-icon">
                                        </i>Create
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('item.index') }}">
                                        <i class="metismenu-icon">
                                        </i>List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('item.pending') }}">
                                        <i class="metismenu-icon">
                                        </i>Pending Verification
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('item.taken') }}">
                                        <i class="metismenu-icon">
                                        </i>Taken
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="metismenu-icon pe-7s-bookmarks"></i>
                                Item Requests
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{--{{ route('ioa.create') }}--}}">
                                        <i class="metismenu-icon">
                                        </i>Create
                                    </a>
                                </li>
                                <li>
                                    <a href="{{--{{ route('ioa.create') }}--}}">
                                        <i class="metismenu-icon">
                                        </i>List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{--{{ route('ioa.create') }}--}}">
                                        <i class="metismenu-icon">
                                        </i>Found
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="metismenu-icon pe-7s-bookmarks"></i>
                                Users
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('user.create') }}">
                                        <i class="metismenu-icon">
                                        </i>Create
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.index') }}">
                                        <i class="metismenu-icon">
                                        </i>List
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">
                @if (session()->has('message_success'))
                    <div class="mb-3 card text-white card-body bg-success">
                        {{ session('message_success') }}
                    </div>
                @endif
                @if (session()->has('message_fail'))
                    <div class="mb-3 card text-white card-body bg-danger">
                        {{ session('message_fail') }}
                    </div>
                @endif
                @if (session()->has('message_info'))
                    <div class="mb-3 card text-white card-body bg-info">
                        {{ session('message_info') }}
                    </div>
                @endif
                @if (session()->has('message_warning'))
                    <div class="mb-3 card text-white card-body bg-warning">
                        {{ session('message_warning') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-3 card text-white card-body bg-info">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-left"></div>
                        <div class="app-footer-right">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="" class="nav-link">IFinfUG</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="logOut" action="{{ route('logout') }}" method="post" style="display:none;">
    @csrf
    <button type="submit">logout</button>
</form>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('js/interaction.js') }}"></script>

<!-- JS from views -->
@yield('js')

</body>
</html>
