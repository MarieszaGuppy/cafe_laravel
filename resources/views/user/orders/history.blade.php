<x-navbar>
    <x-slot:popup></x-slot:popup>
    <x-slot:title>History</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        @forelse ($orders as $order)
            <div>
                <h3>ID Order #{{ $order->user_order_id }}</h3>
                <p>Status: {{ $order->status }}</p>
                <p>Total Price: {{ 'Rp.' . number_format($order->total_price, 2, ',', '.') }}</p>
                <a href="{{ route('order.show', $order->id) }}">Lihat Detail</a>
            </div>
        @empty
            <div class="no-data">
                <div class="alert alert-danger">
                    Belum Ada Histori Order Yang Sedang Diproses.
                </div>
            </div>
        @endforelse
    </div>
</x-navbar>
