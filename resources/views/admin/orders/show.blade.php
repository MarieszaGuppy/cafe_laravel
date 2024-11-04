<x-dashbar>
    <x-slot:title><button onclick="location.href='{{ route('orders.order') }}'"
            class=" btn btn-primary d-md-inline-flex"><i class="ri-arrow-left-line"></i></button></x-slot:title>
    <x-slot:indexx>#{{ $order->id }}</x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <!-- New Section -->
        <div class="new-section">
            <h1>ID Order Pelanggan #{{ $order->user_order_id }}</h1>
            <h3>Pelanggan : {{ $order->user->name }} </h3>
            <p>Status: {{ $order->status }}</p>

            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->menu->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ 'Rp.' . number_format($item->price, 2, ',', '.') }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td>Total Harga</td>
                            <td>{{ 'Rp.' . number_format($order->total_price, 2, ',', '.') }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><button type="button" class="btn btn-primary"
                                    onclick="location.href='{{ route('order.transaction', $order->id) }}'">Bayar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashbar>
