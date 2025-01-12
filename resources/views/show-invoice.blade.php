@extends('master.layout')
@section('content')
<!DOCTYPE html>
<div class="container" style="max-width: 800px; margin: auto; padding: 20px;">
    <!-- Invoice Header Section -->
    <header style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #000; padding-bottom: 15px; margin-bottom: 20px;">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Medical Logo" style="height: 60px;">
            </a>
            <span style="font-size: 24px; font-weight: bold;">Medical.</span>
        </div>
        <div class="contact-info" style="text-align: right;">
            <p><strong>Hospital Kuala Lumpur</strong></p>
            <p>No. 123, Jalan Kesihatan, 50450 Kuala Lumpur, Malaysia</p>
            <p>+60 3-1234-5678</p>
            <p>billinghkl@moh.gov.my</p>
        </div>
    </header>

    <h1 style="text-align: center; margin-bottom: 20px;">Invoice Details</h1>
    
    <!-- Invoice Information -->
    <div style="margin-bottom: 20px;">
        <p><strong>Invoice ID:</strong> {{ $invoice->invoice_id }}</p>
        <p><strong>Bill Date:</strong> {{ $invoice->bill_date }}</p>
        <p><strong>Delivery Date:</strong> {{ $invoice->delivery_date }}</p>
        <p><strong>Payment Deadline:</strong> {{ $invoice->payment_deadline }}</p>
        <p><strong>Terms of Payment:</strong> Within 15 Days</p>
    </div>

    <!-- Patient Details -->
    <h3 style="border-bottom: 1px solid #000; padding-bottom: 5px;">Patient Details</h3>
    <p><strong>Patient Name:</strong> {{ $invoice->patient_name }}</p>
    <p><strong>Billing Address:</strong> {{ $invoice->billing_address }}</p>
    <p><strong>Contact Info:</strong> {{ $invoice->contact_info }}</p>
    <p><strong>Email:</strong> {{ $invoice->email }}</p>
    
    <!-- Invoice Items Table -->
    <h3 style="border-bottom: 1px solid #000; padding-bottom: 5px;">Invoice Items</h3>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="border: 1px solid #ccc; padding: 10px;">Description</th>
                <th style="border: 1px solid #ccc; padding: 10px;">Quantity</th>
                <th style="border: 1px solid #ccc; padding: 10px;">Price (MYR)</th>
                <th style="border: 1px solid #ccc; padding: 10px;">VAT (%)</th>
                <th style="border: 1px solid #ccc; padding: 10px;">Final Amount (MYR)</th>
            </tr>
        </thead>
        <tbody>
            @if($invoice->items && count($invoice->items) > 0)
                @foreach($invoice->items as $item)
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 10px;">{{ $item['description'] }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">{{ $item['quantity'] }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px; text-align: right;">{{ number_format($item['price'], 2) }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px; text-align: center;">{{ number_format($item['vat'], 2) }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px; text-align: right;">{{ number_format($item['final_amount'], 2) }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center; padding: 10px;">No items found for this invoice.</td>
                </tr>
            @endif
        </tbody>
    </table>
    
    <!-- Summary -->
    <h3 style="border-bottom: 1px solid #000; padding-bottom: 5px;">Summary</h3>
    <p><strong>Subtotal:</strong> MYR {{ number_format($invoice->subtotal, 2) }}</p>
    <p><strong>VAT Total:</strong> MYR {{ number_format($invoice->vat_total, 2) }}</p>
    <p><strong>Total Amount:</strong> MYR {{ number_format($invoice->total_amount, 2) }}</p>
    <p><strong>Payment Status:</strong>
        <span style="color: {{ $invoice->payment_status === 'PAID' ? 'green' : 'red' }}; font-weight: bold;">
            {{ $invoice->payment_status }}
        </span>
    </p>
    
    <!-- Buttons Section -->
    <div style="display: flex; justify-content: center; gap: 20px; margin-top: 30px;">
        <button type="button" class="btn" style="background-color: #007bff; color: white; font-size: 16px; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" onclick="printInvoice()">Print</button>
        <a href="{{ route('billing-list') }}" class="btn" style="background-color: #007bff; color: white; font-size: 16px; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">Back to Billing List</a>
    </div>
</div>
@endsection

<script>
    function printInvoice() {
        // Get the invoice section
        const invoiceContent = document.getElementById('invoice-section').outerHTML;

        // Open a new window for printing
        const printWindow = window.open('', '', 'width=800,height=600');

        // Add the invoice content to the print window, including header
        printWindow.document.write(`
            <html>
                <head>
                    <title>Print Invoice</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        header { text-align: center; margin-bottom: 20px; }
                        header .header { display: flex; justify-content: space-between; }
                        header .logo img { height: 60px; }
                        header .contact-info { text-align: right; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
                        th { background-color: #f4f4f4; }
                        .text-success { color: green; }
                        .text-danger { color: red; }
                    </style>
                </head>
                <body>
                    <!-- Print Custom Header -->
                    <header>
                        <div class="header">
                            <!-- Logo Section -->
                            <div class="logo" style="text-align: left;">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Medical Logo" class="h-16" style="height: 60px;">
                                </a>
                                <span>Medical.</span>
                            </div>

                            <!-- Contact Information Section -->
                            <div class="contact-info" style="text-align: right;">
                                <p><strong>Hospital Kuala Lumpur</strong></p>
                                <p>No. 123, Jalan Kesihatan, 50450 Kuala Lumpur, Malaysia</p>
                                <p>+60 3-1234-5678</p>
                                <p>billinghkl@moh.gov.my</p>
                            </div>
                        </div>
                        <h1 style="text-align: center;">Invoice Details</h1>
                    </header>
                    <!-- Print Invoice Content -->
                    ${invoiceContent}
                </body>
            </html>
        `);

        // Close the document stream
        printWindow.document.close();

        // Trigger the print dialog
        printWindow.print();

        // Close the print window after printing
        printWindow.onafterprint = () => printWindow.close();
    }
</script>
