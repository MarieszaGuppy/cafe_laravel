<x-dashbar>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="col-xxl-3 col-md-6">
            <div class="card h-100">
                <div class="card-inner">
                    <div class="card-title-group mb-2">
                        <div class="card-title">
                            <h6 class="title">Cafe Statistics</h6>
                        </div>
                    </div>
                    <ul class="nk-store-statistics">
                        <li class="item">
                            <div class="info">
                                <div class="title">Order</div>
                                <div class="count">{{ $totalOrders }}</div>
                            </div>
                            <em class="icon bg-primary-dim ni ni-bag"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Pelanggan</div>
                                <div class="count">{{ $totalUsers }}</div>
                            </div>
                            <em class="icon bg-info-dim ni ni-users"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Menu</div>
                                <div class="count">{{ $totalMenus }}</div>
                            </div>
                            <em class="icon bg-pink-dim ri-restaurant-line"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Artikel</div>
                                <div class="count">{{ $totalArticles }}</div>
                            </div>
                            <em class="icon bg-orange-dim ni ni-book"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Galeri</div>
                                <div class="count">{{ $totalGalleries }}</div>
                            </div>
                            <em class="icon bg-blue-dim ri-image-line"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Kategori</div>
                                <div class="count">{{ $totalCategories }}</div>
                            </div>
                            <em class="icon bg-purple-dim ni ni-server"></em>
                        </li>
                    </ul>
                </div><!-- .card-inner -->
            </div><!-- .card -->
        </div><!-- .col -->
    </div>
</x-dashbar>
