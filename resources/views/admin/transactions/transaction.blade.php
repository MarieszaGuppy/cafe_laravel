<x-dashbar>
    <x-slot:title>Transaksi</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc>Total {{ $orderCount }} Transaksi</x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ $transactions->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $transactions->lastPage(); $i++)
                <li class="page-item {{ $transactions->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $transactions->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{ $transactions->nextPageUrl() }}" aria-label="Next">
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
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Bayar</th>
                                <th scope="col">Kembali</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <th scope="row">{{ $transaction->order->id }}</th>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->order->user->name }}</td>
                                    <td>{{ $transaction->order->items->sum('quantity') }}</td>
                                    <td>{{ 'Rp.' . number_format($transaction->order->total_price, 2, ',', '.') }}</td>
                                    <td>{{ 'Rp.' . number_format($transaction->amount_paid, 2, ',', '.') }}</td>
                                    <td>{{ 'Rp.' . number_format($transaction->change, 2, ',', '.') }}</td>
                                    <td><a href="{{ route('transactions.struk', $transaction->id) }}"
                                            class="btn btn-primary d-md-inline-flex"><em
                                                class="icon ri-printer-fill"></em></a></td>
                                </tr>
                            @empty
                                <div class="no-data">
                                    <div class="alert alert-danger">
                                        Transaksi Belum Tersedia.
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
