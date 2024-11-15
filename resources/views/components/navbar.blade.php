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
    @vite(['resources/css/style.css'])
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/dashlite.css'])
    @vite(['resources/css/theme.css'])
</head>

<body class="nk-body bg-lighter npc-default has-sidebar">
    {{ $popup }}
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- navbar @s -->
            <nav class="navbar navbar-expand-lg border-bottom border-body">
                <div class="container-fluid">
                    <img src="{{ asset('storage/img/long.png') }}" alt="" style="width: 10%"
                        class="navbar-brand">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                            style="--bs-scroll-height: 100px;">
                            <x-nav-link :active="request()->is('/home')">
                                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Beranda</a>
                            </x-nav-link><!-- .nk-menu-item -->
                            <x-nav-link :active="request()->is('/about')">
                                <a class="nav-link" aria-current="page" href="{{ route('about') }}">Tentang Kami</a>
                            </x-nav-link><!-- .nk-menu-item -->
                            <x-nav-link :active="request()->is('/menu')">
                                <a class="nav-link" aria-current="page" href="{{ route('menu') }}">Menu</a>
                            </x-nav-link><!-- .nk-menu-item -->
                            <x-nav-link :active="request()->is('/history')">
                                <a class="nav-link" aria-current="page" href="{{ route('history') }}">Riwayat</a>
                            </x-nav-link><!-- .nk-menu-item -->
                            <x-nav-link :active="request()->is('/article')">
                                <a class="nav-link" aria-current="page" href="{{ route('article') }}">Artikel</a>
                            </x-nav-link><!-- .nk-menu-item -->
                            <x-nav-link :active="request()->is('/gallery')">
                                <a class="nav-link" aria-current="page" href="{{ route('gallery') }}">Galeri</a>
                            </x-nav-link><!-- .nk-menu-item -->
                            <x-nav-link :active="request()->is('/contact')">
                                <a class="nav-link" aria-current="page" href="{{ route('contact') }}">Kontak Kami</a>
                            </x-nav-link><!-- .nk-menu-item -->


                        </ul>
                        @auth
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="btn btn-outline-danger">Keluar</button>
                            </form>
                        @endauth

                    </div>
                </div>
            </nav>
            <!---navbar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">{{ $title }}<strong
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
    <footer class="footer">
        <div class="footer__container container grid">
            <div>
                <a href="#" class="footer__logo">
                    <i class="ri-restaurant-line"></i> TeaJam Cafe
                </a>

                <p class="footer__description">
                    Rasakan kenikmatan <br>
                    perpaduan rasa teh <br>
                    yang menenangkan.
                </p>
            </div>

            <div class="footer__data grid">
                <div>
                    <h3 class="footer__title">About</h3>
                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">Awards</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">FAQs</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Privacy policy</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Terms of services</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer__title">Company</h3>
                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">Blogs</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Community</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Our team</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Help center</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer__title">Contact</h3>
                    <ul class="footer__links">
                        <li>
                            <address class="footer__info">
                                Jl. Cauliflower No.123, Kota Greens, <br>
                                Provinsi HertzVancouver, BC, Canada
                            </address>
                        </li>
                        <li>
                            <address class="footer__info">
                                teajamcafe@gmail.com <br>
                                (62)8111212113
                            </address>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer__title">Social</h3>
                    <div class="footer__social">
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class="ri-facebook-circle-line"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                            <i class="ri-twitter-x-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <span class="footer__copy">
            Special Thanks To Our Loyal Customers
        </span>
    </footer>
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
