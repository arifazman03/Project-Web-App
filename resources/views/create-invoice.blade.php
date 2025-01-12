{{-- @extends('master.layout')
@section('title', 'New Invoice')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header { max-width: 900px;
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
            padding: 10px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn-cancel {
            background-color: #dc3545;
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
        <div class="total-amount">
            <p>Total Amount</p>
            <p><strong>MYR</strong></p>
        </div>
    </div>
    <div class="container">
        <form id="invoice-form" action="{{ route('invoices.store') }}" method="POST">
            @csrf
    <div class="form-section">
    <div>
        <label for="bill_date">Bill Date:</label>
        <input type="date" id="bill_date" name="bill_date" required>
    </div>
    <div>
        <label for="delivery_date">Delivery Date:</label>
        <input type="date" id="delivery_date" name="delivery_date" required>
    </div>
    <div>
        <label for="terms">Terms of Payment:</label>
        <label for="terms">Within 15 Days</label>
    </div>
    <div>
        <label for="payment_deadline">Payment Deadline:</label>
        <input type="date" id="payment_deadline" name="payment_deadline" required>
    </div>
</div>
<div class="form-section">
    <div>
        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" required>
    </div>
    <div>
        <label for="billing_address">Billing Address:</label>
        <input type="text" id="billing_address" name="billing_address" required>
    </div>
    <div>
        <label for="contact_info">Contact Number:</label>
        <input type="text" id="contact_info" name="contact_info" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="invoice_id">Invoice ID:</label>
        <input type="text" id="invoice_id" name="invoice_id" required>
    </div>
</div>
<table>
    <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price (MYR)</th>
            <th>VAT</th>
            <th>Final Amount (MYR)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="invoice-items">
        <tr>
            <td><input type="text" name="description[]" placeholder="Enter treatment/service received" required></td>
            <td><input type="number" name="quantity[]" value="0" required oninput="calculateFinalAmount(this)"></td>
            <td><input type="number" step="0.01" name="price[]" value="0.00" required oninput="calculateFinalAmount(this)"></td>
            <td><input type="number" step="0.01" name="vat[]" value="0.00" oninput="calculateFinalAmount(this)"></td>
            <td><input type="number" step="0.01" name="final_amount[]" value="0.00" readonly></td>
            <td><button type="button" onclick="removeRow(this)">Remove</button></td>
        </tr>
    </tbody>
</table>
<button type="button" class="btn" onclick="addRow()">Add Row</button>
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

<button type="submit" class="btn btn-primary">Save</button>
<button type="button" class="btn btn-cancel" onclick="window.location.href='{{ route('billing-list') }}'">Cancel</button>

        </form>

        <script>
            // First, add the form submission handler
            document.getElementById('invoice-form').addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Collect items data
                const items = [];
                document.querySelectorAll('#invoice-items tr').forEach(row => {
                    items.push({
                        description: row.querySelector('input[name="description[]"]').value,
                        quantity: row.querySelector('input[name="quantity[]"]').value,
                        price: row.querySelector('input[name="price[]"]').value,
                        vat: row.querySelector('input[name="vat[]"]').value,
                        final_amount: row.querySelector('input[name="final_amount[]"]').value
                    });
                });

                // Add hidden input for items
                const itemsInput = document.createElement('input');
                itemsInput.type = 'hidden';
                itemsInput.name = 'items';
                itemsInput.value = JSON.stringify(items);
                this.appendChild(itemsInput);

                // Submit the form
                this.submit();
            });

            function calculateFinalAmount(element) {
                const row = element.closest('tr');
                const quantity = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
                const price = parseFloat(row.querySelector('input[name="price[]"]').value) || 0;
                const vat = parseFloat(row.querySelector('input[name="vat[]"]').value) || 0;

                const finalAmount = quantity * price;
                const vatTotal = finalAmount * (vat / 100);
                const totalAmount = finalAmount + vatTotal;

                row.querySelector('input[name="final_amount[]"]').value = finalAmount.toFixed(2);

                updateSummary();
            }

            function updateSummary() {
                const rows = document.querySelectorAll('#invoice-items tr');
                let subtotal = 0;
                let vatTotal = 0;
                let totalAmount = 0;

                rows.forEach(row => {
                    const finalAmount = parseFloat(row.querySelector('input[name="final_amount[]"]').value) || 0;
                    const vat = parseFloat(row.querySelector('input[name="vat[]"]').value) || 0;

                    subtotal += finalAmount;
                    vatTotal += finalAmount * (vat / 100);
                });

                totalAmount = subtotal + vatTotal;

                document.getElementById('subtotal').value = subtotal.toFixed(2);
                document.getElementById('vat-total').value = vatTotal.toFixed(2);
                document.getElementById('total-amount').value = totalAmount.toFixed(2);
            }

            function addRow() {
                const table = document.getElementById('invoice-items');
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><input type="text" name="description[]" placeholder="Enter treatment/service received" required></td>
                    <td><input type="number" name="quantity[]" value="0" required oninput="calculateFinalAmount(this)"></td>
                    <td><input type="number" step="0.01" name="price[]" value="0.00" required oninput="calculateFinalAmount(this)"></td>
                    <td><input type="number" step="0.01" name="vat[]" value="0.00" oninput="calculateFinalAmount(this)"></td>
                    <td><input type="number" step="0.01" name="final_amount[]" value="0.00" readonly></td>
                    <td><button type="button" onclick="removeRow(this)">Remove</button></td>
                `;
                table.appendChild(row);
            }

            function removeRow(button) {
                const row = button.closest('tr');
                row.remove();
                updateSummary();
            }
            </script>

</body>
</html>
@endsection --}}

@extends('master.layout')
@section('content')

<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Invoice</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

 <div class="section-padding30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    <span>Billing</span>
                    <h2>New Invoice</h2>
                </div>
            </div>
        </div>

        <form id="invoice-form" action="{{ route('invoices.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Bill Date, Delivery Date, etc. -->
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="bill_date" class="form-label">Bill Date</label>
                        <input type="date" name="bill_date" class="form-control" id="bill_date" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="delivery_date" class="form-label">Delivery Date</label>
                        <input type="date" name="delivery_date" class="form-control" id="delivery_date" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="payment_deadline" class="form-label">Due Date (Payment deadline - 15 days from bill date)</label>
                        <input type="date" name="payment_deadline" class="form-control" id="payment_deadline" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="invoice_id" class="form-label">Invoice ID</label>
                        <input type="text" name="invoice_id" class="form-control" id="invoice_id" placeholder="e.g., INV1995" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <input type="text" name="patient_name" class="form-control" id="patient_name" placeholder="Enter patient's full name" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="billing_address" class="form-label">Billing Address</label>
                        <input type="text" name="billing_address" class="form-control" id="billing_address" placeholder="Enter complete address" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="contact_info" class="form-label">Contact Number</label>
                        <input type="text" name="contact_info" class="form-control" id="contact_info" placeholder="Enter phone number" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" required>
                    </div>
                </div>
            </div>

            <div class="table-responsive mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price (MYR)</th>
                            <th>VAT</th>
                            <th>Final Amount (MYR)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="invoice-items">
                        <tr>
                            <td><input type="text" name="description[]" class="form-control" placeholder="Enter treatment/service" required></td>
                            <td><input type="number" name="quantity[]" class="form-control" value="0" required oninput="calculateFinalAmount(this)"></td>
                            <td><input type="number" step="0.01" name="price[]" class="form-control" value="0.00" required oninput="calculateFinalAmount(this)"></td>
                            <td><input type="number" step="0.01" name="vat[]" class="form-control" value="0.00" oninput="calculateFinalAmount(this)"></td>
                            <td><input type="number" step="0.01" name="final_amount[]" class="form-control" value="0.00" readonly></td>
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <button type="button" class="btn btn-secondary" onclick="addRow()">Add Row</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <div class="form-group mb-2">
                        <label>Subtotal:</label>
                        <input type="number" step="0.01" id="subtotal" name="subtotal" class="form-control" readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label>VAT Total:</label>
                        <input type="number" step="0.01" id="vat-total" name="vat_total" class="form-control" readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label>Total Amount:</label>
                        <input type="number" step="0.01" id="total-amount" name="total_amount" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Payment Status:</label>
                        <select name="payment_status" id="payment_status" class="form-control" required>
                            <option value="PAID">PAID</option>
                            <option value="UNPAID">UNPAID</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center mt-4">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('billing-list') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

</main>

<script>
    document.getElementById('bill_date').addEventListener('change', function() {
    const billDate = new Date(this.value);
    const deadlineDate = new Date(billDate);
    deadlineDate.setDate(deadlineDate.getDate() + 15); // Add 15 days

    // Format the date as YYYY-MM-DD for the input
    const formattedDate = deadlineDate.toISOString().split('T')[0];
    document.getElementById('payment_deadline').value = formattedDate;
});
    document.getElementById('invoice-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const items = [];
        document.querySelectorAll('#invoice-items tr').forEach(row => {
            items.push({
                description: row.querySelector('input[name="description[]"]').value,
                quantity: row.querySelector('input[name="quantity[]"]').value,
                price: row.querySelector('input[name="price[]"]').value,
                vat: row.querySelector('input[name="vat[]"]').value,
                final_amount: row.querySelector('input[name="final_amount[]"]').value
            });
        });
        const itemsInput = document.createElement('input');
        itemsInput.type = 'hidden';
        itemsInput.name = 'items';
        itemsInput.value = JSON.stringify(items);
        this.appendChild(itemsInput);
        this.submit();
    });

    function calculateFinalAmount(element) {
        const row = element.closest('tr');
        const quantity = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
        const price = parseFloat(row.querySelector('input[name="price[]"]').value) || 0;
        const vat = parseFloat(row.querySelector('input[name="vat[]"]').value) || 0;
        const finalAmount = quantity * price;
        const vatTotal = finalAmount * (vat / 100);
        const totalAmount = finalAmount + vatTotal;
        row.querySelector('input[name="final_amount[]"]').value = finalAmount.toFixed(2);
        updateSummary();
    }

    function updateSummary() {
        const rows = document.querySelectorAll('#invoice-items tr');
        let subtotal = 0;
        let vatTotal = 0;
        let totalAmount = 0;
        rows.forEach(row => {
            const finalAmount = parseFloat(row.querySelector('input[name="final_amount[]"]').value) || 0;
            const vat = parseFloat(row.querySelector('input[name="vat[]"]').value) || 0;
            subtotal += finalAmount;
            vatTotal += finalAmount * (vat / 100);
        });
        totalAmount = subtotal + vatTotal;
        document.getElementById('subtotal').value = subtotal.toFixed(2);
        document.getElementById('vat-total').value = vatTotal.toFixed(2);
        document.getElementById('total-amount').value = totalAmount.toFixed(2);
    }

    function addRow() {
        const table = document.getElementById('invoice-items');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" name="description[]" class="form-control" placeholder="Enter treatment/service" required></td>
            <td><input type="number" name="quantity[]" class="form-control" value="0" required oninput="calculateFinalAmount(this)"></td>
            <td><input type="number" step="0.01" name="price[]" class="form-control" value="0.00" required oninput="calculateFinalAmount(this)"></td>
            <td><input type="number" step="0.01" name="vat[]" class="form-control" value="0.00" oninput="calculateFinalAmount(this)"></td>
            <td><input type="number" step="0.01" name="final_amount[]" class="form-control" value="0.00" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
        `;
        table.appendChild(row);
    }

    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
        updateSummary();
    }
</script>

@endsection
