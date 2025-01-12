@extends('master.layout')
@section('content')

<style>
.button-container {
    text-align: center; /* Center the button horizontally */
    margin-top: 20px; /* Optional, add space above the button */
}

.btn {
    padding: 10px 20px;
    background-color: rgb(3, 126, 249); /* Blue color */
    color: #fff;
    border: none;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;
}

.btn-primary {
    background-color: rgb(3, 126, 249); /* Blue */
}

</style>
<!DOCTYPE html>
<div class="container">
    <h1>Billing List</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Invoice ID</th>
                <th>Date</th>
                <th>Patient</th>
                <th>Total Amount</th>
                <th>Payment Status</th>
                <th>Actions</th>
            </tr>
        </thead>
    <tbody>
    @foreach($invoices as $invoice)
    @php
        $descriptions = json_decode($invoice->description, true);
        $quantities = json_decode($invoice->quantity, true);
        $prices = json_decode($invoice->price, true);
        $vats = json_decode($invoice->vat, true);
        $finalAmounts = json_decode($invoice->final_amount, true);
    @endphp
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $invoice->invoice_id }}</td>
        <td>{{ $invoice->bill_date }}</td>
        <td>{{ $invoice->patient_name }}</td>
        <td>MYR {{ number_format($invoice->total_amount, 2) }}</td>
        <td>
            <span class="{{ $invoice->payment_status === 'PAID' ? 'status-paid' : 'status-unpaid' }}">
                {{ $invoice->payment_status }}
            </span>
        </td>
        <td>
            <a href="{{ route('invoice.show', $invoice->id) }}" class="text-info" title="View Invoice">👁️</a>
            <a href="{{ route('invoice.edit', $invoice->id) }}" class="text-info" title="Edit Invoice">✏️</a>
            <a href="#" class="text-danger delete-invoice" data-id="{{ $invoice->id }}" title="Delete Invoice">🗑️</a>
        </td>
    </tr>
    @endforeach

        </tbody>
    </table>

   <div class="button-container">
    <a href="{{ route('create-invoice') }}" class="btn btn-primary">Add new billing</a>
</div>

</div>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-invoice');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            const invoiceId = this.getAttribute('data-id');

            if (confirm('Are you sure you want to delete this invoice?')) {
                // Send AJAX request to delete the invoice
                fetch(`/invoice/${invoiceId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the row from the table
                        row.remove();
                        alert(data.message);
                    } else {
                        alert('Failed to delete the invoice.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the invoice.');
                });
            }
        });
    });
});

</script>

@endsection
