<x-dashbar>
    <x-slot:title><button onclick="location.href='{{ route('admin.transactions') }}'"
            class=" btn btn-primary d-md-inline-flex"><i class="ri-arrow-left-line"></i></button>Struk</x-slot:title>
    <x-slot:indexx># {{ $transaction->id }}</x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="invoice">
            <div class="invoice-action">
                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="html/invoice-print.html"
                    target="_blank"><em class="icon ni ni-printer-fill"></em></a>
            </div><!-- .invoice-actions -->
            <div class="invoice-wrap">
                <div class="invoice-brand text-center">
                    <img src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
                </div>
                <div class="invoice-head">
                    <div class="invoice-contact">
                        <span class="overline-title">Struk Pembayaran Untuk</span>
                        <div class="invoice-contact-info">
                            <h4 class="title">{{ $transaction->order->user->name }}</h4>
                            <ul class="list-plain">
                                <li><em class="icon ni ni-map-pin-fill"></em><span> Jl. Cauliflower No.123, Kota Greens,
                                        Provinsi Hertz</span></li>
                                <li><em class="icon ni ni-call-fill"></em><span>(62)8111212113</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="invoice-desc">
                        <h3 class="title">Invoice</h3>
                        <ul class="list-plain">
                            <li class="invoice-id"><span>Invoice ID</span>:<span>{{ $transaction->id }}</span></li>
                            <li class="invoice-date">
                                <span>Date</span>:<span>{{ $transaction->created_at->format('d M Y') }}</span>
                            </li>
                        </ul>
                    </div>
                </div><!-- .invoice-head -->
                <div class="invoice-bills">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="w-150px">Menu ID</th>
                                    <th class="w-60">Nama</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction->order->items as $item)
                                    <tr>
                                        <td>{{ $item->menu->id }}</td>
                                        <td>{{ $item->menu->name }}</td>
                                        <td>{{ 'Rp.' . number_format($item->menu->price, 2, ',', '.') }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ 'Rp.' . number_format($item->menu->price * $item->quantity, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Total</td>
                                    <td>{{ 'Rp.' . number_format($transaction->order->total_price, 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Bayar</td>
                                    <td>{{ 'Rp.' . number_format($transaction->amount_paid, 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Kembali</td>
                                    <td>{{ 'Rp.' . number_format($transaction->change, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is
                            valid without the signature and seal. </div>
                    </div>
                </div><!-- .invoice-bills -->
            </div><!-- .invoice-wrap -->
        </div><!-- .invoice -->
    </div><!-- .nk-block -->
</x-dashbar>
