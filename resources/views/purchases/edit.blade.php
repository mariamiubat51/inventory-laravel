
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Purchase - {{ $purchase->invoice_no }}</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Supplier</label>
                <select name="supplier_id" class="form-control" required>
                    <option value="">-- Select Supplier --</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Purchase Date</label>
                <input type="date" name="purchase_date" class="form-control" value="{{ $purchase->purchase_date->format('Y-m-d') }}" required>
            </div>
        </div>

        <table class="table table-bordered" id="products-table">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Buying Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchase->items as $item)
                <tr>
                    <td>
                        <select name="product_id[]" class="form-control product-select" required>
                            <option value="">-- Select Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $item->product_id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control qty" value="{{ $item->quantity }}" required></td>
                    <td><input type="number" name="buying_price[]" class="form-control price" step="0.01" value="{{ $item->buying_price }}" required></td>
                    <td><input type="text" class="form-control subtotal" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">❌</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" id="add-row" class="btn btn-secondary mb-3">➕ Add Product</button>

        <div class="row">
            <div class="col-md-4">
                <label>Paid Amount</label>
                <input type="number" name="paid_amount" class="form-control" step="0.01" value="{{ $purchase->paid_amount }}" required>
            </div>
            <div class="col-md-8">
                <label>Notes (optional)</label>
                <textarea name="notes" class="form-control" rows="2">{{ $purchase->notes }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">💾 Update Purchase</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    function updateSubtotals() {
        document.querySelectorAll('#products-table tbody tr').forEach(row => {
            const qty = parseFloat(row.querySelector('.qty')?.value || 0);
            const price = parseFloat(row.querySelector('.price')?.value || 0);
            row.querySelector('.subtotal').value = (qty * price).toFixed(2);
        });
    }

    updateSubtotals();

    document.querySelector('#add-row').addEventListener('click', function () {
        const row = document.querySelector('#products-table tbody tr');
        const clone = row.cloneNode(true);

        clone.querySelectorAll('input').forEach(input => input.value = '');
        clone.querySelector('select').value = '';

        row.parentNode.appendChild(clone);
        updateSubtotals();
    });

    document.querySelector('#products-table').addEventListener('input', function () {
        updateSubtotals();
    });

    document.querySelector('#products-table').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            const rows = document.querySelectorAll('#products-table tbody tr');
            if (rows.length > 1) {
                e.target.closest('tr').remove();
                updateSubtotals();
            }
        }
    });
});
</script>
@endpush
