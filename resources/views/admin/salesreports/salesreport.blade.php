<x-dashbar>
    <x-slot:title>Laporan Penjualan</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="col-xxl-3 col-sm-6">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Pendapatan Hari Ini</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount">{{ 'Rp.' . number_format($totalRevenue, 2, ',', '.') }}</div>
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
            </div><!-- .card -->
        </div><!-- .col -->
    </div>
</x-dashbar>
