<x-dashbar>
    <x-slot:title>Transaction</x-slot:title>
    <x-slot:indexx>#{{ $order->id }}</x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        @if ($order->status === 'processed')
            <form action="{{ route('transactions.store', $order) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="amount_paid">Jumlah Dibayar:</label>
                    <input type="number" name="amount_paid" id="amount_paid" required min="0" step="0.01">
                </div>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        @endif
    </div>
</x-dashbar>
