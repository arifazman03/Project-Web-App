@extends('master.layout')
@section('title', 'Edit Invoice')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10px;
            border-bottom: 1px solid #ccc;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 36px;
        }
        .contact-info {
            text-align: left;
            font-size: 5px;
        }
        .contact-info p {
            margin: 0;
            font-size: 12px;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center the content of the invoice */
        }
        .form-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-section div {
            flex: 1;
            margin-right: 10px;
        }
        .form-section div:last-child {
            margin-right: 0;
        }
        .summary-section {
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }

        .primary-btn {
        padding: 10px 20px;
        background-color: rgb(43, 191, 57);
        color: #fff;
        border: none;
        cursor: pointer;
        margin-top: 20px;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
      }

     .cancel-btn {
        padding: 10px 20px;
        background-color: #dc3545;
        color: #fff;
        border: none;
        cursor: pointer;
        margin-top: 20px;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
        }

    .danger-btn {
    padding: 10px 20px;
    background-color: #dc3545; /* Same red as cancel-btn */
    color: white;
    border: none;
    cursor: pointer;
    margin-top: 20px;
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;
    }

    .add-btn {
    padding: 10px 20px;
    background-color: rgb(3, 126, 249); /* Blue */
    color: #fff;
    border: none;
    cursor: pointer;
    margin-top: 20px;
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;

        .center-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    </head>
    <body>
        <div class="header">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Medical Logo" class="h-16">
            </a>
            <span>Medical.</span>
        </div>
        <div class="contact-info">
            <p><strong>Hospital Kuala Lumpur</strong></p>
            <p>No. 123, Jalan Kesihatan, 50450 Kuala Lumpur, Malaysia</p>
            <p>+60 3-1234-5678</p>
            <p>billinghkl@moh.gov.my</p>
        </div>
     </div>

      <div class="container">
        <h2>Edit Invoice</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="invoice-form" action="{{ route('invoice.update', $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-section">
                <div>
                    <label for="bill_date">Bill Date:</label>
                    <input type="date" id="bill_date" name="bill_date" value="{{ old('bill_date', $invoice->bill_date) }}" required>
                </div>
                <div>
                    <label for="delivery_date">Delivery Date:</label>
                    <input type="date" id="delivery_date" name="delivery_date" value="{{ old('delivery_date', $invoice->delivery_date) }}" required>
                </div>
                <div>
                    <label for="payment_deadline">Payment Deadline:</label>
                    <input type="date" id="payment_deadline" name="payment_deadline" value="{{ old('payment_deadline', $invoice->payment_deadline) }}" required>
                </div>
            </div>
         <div class="form-section">
          <div>
            <label for="patient_name">Patient Name:</label>
            <input type="text" id="patient_name" name="patient_name" value="{{ old('patient_name', $invoice->patient_name) }}" required>
        </div>
        <div>
            <label for="billing_address">Billing Address:</label>
            <input type="text" id="billing_address" name="billing_address" value="{{ old('billing_address', $invoice->billing_address) }}" required>
        </div>
        <div>
            <label for="contact_info">Contact Number:</label>
            <input type="text" id="contact_info" name="contact_info" value="{{ old('contact_info', $invoice->contact_info) }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $invoice->email) }}" required>
        </div>
        <div>
            <label for="invoice_id">Invoice ID:</label>
            <input type="text" id="invoice_id" name="invoice_id" value="{{ old('invoice_id', $invoice->invoice_id) }}" required>
        </div>
     </div>

      <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price (MYR)</th>
                <th>VAT (6%)</th>
                <th>Final Amount (MYR)</th>
                <th>Actions</th>
            </tr>
        </thead>
            <tbody id="invoice-items">
        @if(!empty($invoice->items) && $invoice->items->count())
            @foreach($invoice->items as $item)
                <tr>
                    <td><input type="text" name="description[]" value="{{ $item->description }}" /></td>
                    <td><input type="number" name="quantity[]" value="{{ $item->quantity }}" /></td>
                    <td><input type="number" step="0.01" name="price[]" value="{{ $item->price }}" /></td>
                    <td><input type="number" step="0.01" name="vat[]" value="6" readonly /></td>
                    <td><input type="number" step="0.01" name="final_amount[]" value="{{ $item->final_amount }}" /></td>
                    <td><button type="button" class="danger-btn btn-sm" onclick="removeRow(this)">Remove</button></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">No items found.</td>
            </tr>
        @endif
            </tbody>
        </table>

        <div class="center-button">
                <button type="button" class="add-btn" onclick="addRow()">Add Row</button>
        </div>

        <div class="summary-section">
            <p>Subtotal: <input type="number" step="0.01" id="subtotal" name="subtotal" readonly></p>
            <p>VAT Total: <input type="number" step="0.01" id="vat-total" name="vat_total" readonly></p>
            <p>Total Amount: <input type="number" step="0.01" id="total-amount" name="total_amount" readonly></p>

            <label for="payment_status">Payment Status:</label>
            <select name="payment_status" id="payment_status" required>
                <option value="PAID">PAID</option>
                <option value="UNPAID">UNPAID</option>
            </select>
        </div>

        <button type="submit" class="primary-btn">Update Invoice</button>
        <button type="button" class="cancel-btn" onclick="window.location.href='{{ route('billing-list') }}'">Cancel</button>
        </form>
        </div>
    </body>
</html>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Calculate final amount for a row and update totals
            function calculateFinalAmount(element) {
                const row = element.closest('tr');
                const quantity = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
                const price = parseFloat(row.querySelector('input[name="price[]"]').value) || 0;
                const vatAmount = quantity * price * 0.06;

                const baseAmount = quantity * price;
                row.querySelector('input[name="final_amount[]"]').value = (baseAmount + vatAmount).toFixed(2);
                updateSummary();
            }

            // Update summary totals
            function updateSummary() {
                const rows = document.querySelectorAll('#invoice-items tr');
                let subtotal = 0;
                let vatTotal = 0;

                rows.forEach(row => {
                    const quantity = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
                    const price = parseFloat(row.querySelector('input[name="price[]"]').value) || 0;
                    const baseAmount = quantity * price;
                    const vatAmount = baseAmount * 0.06;

                    subtotal += baseAmount;
                    vatTotal += vatAmount;
                });

                const totalAmount = subtotal + vatTotal;

                // Update the summary fields
                document.getElementById('subtotal').value = subtotal.toFixed(2);
                document.getElementById('vat-total').value = vatTotal.toFixed(2);
                document.getElementById('total-amount').value = totalAmount.toFixed(2);
            }

            // Add a new row
            function addRow() {
                const table = document.getElementById('invoice-items');
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><input type="text" name="description[]" class="form-control" placeholder="Enter treatment/service" required></td>
                    <td><input type="number" name="quantity[]" class="form-control" value="0" required></td>
                    <td><input type="number" step="0.01" name="price[]" class="form-control" value="0.00" required></td>
                    <td><input type="number" step="0.01" name="vat[]" class="form-control" value="6" readonly></td>
                    <td><input type="number" step="0.01" name="final_amount[]" class="form-control" value="0.00" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
                `;

                // Add event listeners to the new row's inputs
                const inputs = row.querySelectorAll('input[name="quantity[]"], input[name="price[]"]');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        calculateFinalAmount(this);
                    });
                });

                table.appendChild(row);
                updateSummary();
            }

            // Remove a row
            function removeRow(button) {
                const row = button.closest('tr');
                row.remove();
                updateSummary();
            }

            // Add event listeners to existing rows
            document.querySelectorAll('#invoice-items tr').forEach(row => {
                const inputs = row.querySelectorAll('input[name="quantity[]"], input[name="price[]"]');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        calculateFinalAmount(this);
                    });
                });
            });

            // Make functions globally available
            window.addRow = addRow;
            window.removeRow = removeRow;
            window.calculateFinalAmount = calculateFinalAmount;
            window.updateSummary = updateSummary;

            // Calculate initial totals
            updateSummary();

            // Form submission handler
            document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('invoice-form');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Append hidden input for invoice items
        const items = [];
        document.querySelectorAll('#invoice-items tr').forEach(row => {
            items.push({
                description: row.querySelector('input[name="description[]"]').value,
                quantity: row.querySelector('input[name="quantity[]"]').value,
                price: row.querySelector('input[name="price[]"]').value,
                vat: 6,
                final_amount: row.querySelector('input[name="final_amount[]"]').value
            });
        });

        const itemsInput = document.createElement('input');
        itemsInput.type = 'hidden';
        itemsInput.name = 'items';
        itemsInput.value = JSON.stringify(items);
        form.appendChild(itemsInput);

        form.submit(); // Call the native submit method
        });
    });
    });
        </script>

</div>
@endsection
