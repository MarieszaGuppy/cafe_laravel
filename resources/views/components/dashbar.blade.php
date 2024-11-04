<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('storage/img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <!-- Page Title  -->
    <title>Dashboard TeaJam Cafe</title>
    <!-- StyleSheets  -->
    @vite(['resources/css/dashlite.css'])
    @vite(['resources/css/theme.css'])
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="views/dashboard.blade.php" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ asset('storage/img/logo.png') }}"
                                srcset="{{ asset('storage/img/logo.png') }} 2x" alt="logo">
                            <img class="logo-dark logo-img" src="{{ asset('storage/img/logo.png') }}"
                                srcset="{{ asset('storage/img/logo.png') }} 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="{{ asset('storage/img/logo.png') }}"
                                srcset="{{ asset('storage/img/logo.png') }} 2x" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                            data-target="sidebarMenu"><em class="icon ri-arrow-left-s-line"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                            data-target="sidebarMenu"><em class="icon ri-menu-fill"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <x-dash-link :active="request()->is('admin/home')">
                                    <a href="{{ route('admin.home') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ri-home-2-line"></em></span>
                                        <span class="nk-menu-text">Beranda</span>
                                    </a>
                                </x-dash-link><!-- .nk-menu-item -->
                                <x-dash-link :active="request()->is('admin/users')">
                                    <a href="/admin/users" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ri-group-line"></em></span>
                                        <span class="nk-menu-text">Pengguna</span>
                                    </a>
                                </x-dash-link><!-- .nk-menu-item -->
                                <x-dash-link :active="request()->is('admin/articles')">
                                    <a href="/admin/articles" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ri-news-line"></em></span>
                                        <span class="nk-menu-text">Artikel</span>
                                    </a>
                                </x-dash-link><!-- .nk-menu-item -->
                                <x-dash-link :active="request()->is('admin/galleries')">
                                    <a href="/admin/galleries" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ri-gallery-fill"></em></span>
                                        <span class="nk-menu-text">Galeri</span>
                                    </a>
                                </x-dash-link><!-- .nk-menu-item -->
                                <x-dash-link :active="request()->is('admin/menus')">
                                    <a href="/admin/menus" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ri-restaurant-line"></em></span>
                                        <span class="nk-menu-text">Menu</span>
                                    </a>
                                </x-dash-link><!-- .nk-menu-item -->
                                <x-dash-link :active="request()->is('admin/orders')">
                                    <a href="{{ route('orders.order') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ri-file-list-line"></em></span>
                                        <span class="nk-menu-text">Order</span>
                                    </a>
                                </x-dash-link><!-- .nk-menu-item -->
                                <x-dash-link :active="request()->is('admin/transactions')">
                                    <a href="{{ route('admin.transactions') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><i class="icon ri-cash-line"></i></span>
                                        <span class="nk-menu-text">Transaksi</span>
                                    </a>
                                </x-dash-link><!-- .nk-menu-item -->
                                <x-dash-link :active="request()->is('admin/salesreports')">
                                    <a href="{{ route('admin.salesreports') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ri-bar-chart-line"></em></span>
                                        <span class="nk-menu-text">Laporan</span>
                                    </a>
                                </x-dash-link><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                        class="icon ri-menu-fill"></em></a>
                            </div> {{-- this is sidebar menu collapsed --}}
                            <div class="nk-header-brand d-xl-none">
                                <a href="{{ route('landing') }}" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('storage/img/logo.png') }}"
                                        srcset="{{ asset('storage/img/logo.png') }} 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="{{ asset('storage/img/logo.png') }}"
                                        srcset="{{ asset('storage/img/logo.png') }} 2x" alt="logo-dark">
                                </a>
                            </div>{{-- .nk-header-brand --}}
                            <div class="nk-header-search ms-3 ms-xl-0">
                                <em class="icon ri-search-line"></em>
                                <input type="text" class="form-control border-transparent form-focus-none"
                                    placeholder="Cari">
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon"
                                            data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em
                                                    class="icon ri-notification-3-line"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to
                                                                <span>Widthdrawl</span>
                                                            </div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em
                                                                class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit
                                                                    Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ri-user-line"></em>
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-name">{{ $userName }} <i
                                                            class="ri-arrow-down-s-line"></i></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        @php
                                                            // Ambil inisial dari nama
                                                            $initial = '';
                                                            if (!empty($userName)) {
                                                                $nameParts = explode(' ', $userName);
                                                                foreach ($nameParts as $part) {
                                                                    $initial .= strtoupper(substr($part, 0, 1));
                                                                }
                                                            }
                                                        @endphp
                                                        <span>{{ $initial }}</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ $userName }}</span>
                                                        <span class="sub-text">{{ $userEmail }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#"><em
                                                                class="icon ri-user-line"></em><span>Lihat
                                                                Profile</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em
                                                                class="icon ri-moon-line"></em><span>Mode
                                                                Gelap</span></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="dropdown-inner">
                                                <form method="POST" action="/logout">
                                                    @csrf
                                                    <ul class="link-list">
                                                        <li><button class="btn btn-outline-danger">Keluar</button>

                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">{{ $title }} <strong
                                                    class="text-primary small">{{ $indexx }}</strong></h3>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    {{ $desc }}
                                                </ul>
                                            </div>
                                        </div><!-- .nk-block-head-content -->

                                        <div class="nk-block-head-content">
                                            {{ $heading }}
                                        </div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    {{ $slot }}
                                </div> {{-- .nk-block --}}
                            </div>
                            <div class="no-data"></div>
                        </div>
                    </div>

                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">

    </div><!-- .modal -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/charts/chart-ecommerce.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>

</html>
