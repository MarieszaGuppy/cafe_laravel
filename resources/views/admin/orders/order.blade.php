<x-dashbar>
    <x-slot:title>Order</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc>Total {{ $orderCount }} Order</x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ $orders->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $orders->lastPage(); $i++)
                <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{ $orders->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <br>
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->items->sum('quantity') }}</td>
                                    <td>{{ 'Rp.' . number_format($order->total_price, 2, ',', '.') }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-success"
                                                onclick="location.href='{{ route('orders.show', $order->id) }}'">Lihat</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="location.href='{{ route('order.transaction', $order->id) }}'">Bayar</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="no-data">
                                    <div class="alert alert-danger">
                                        Order Belum Tersedia.
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dashbar>
