<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('create-invoice');
    }

    public function index()
    {
        $invoices = Invoice::all();  // Get all invoices
        return view('billing-list', compact('invoices'));
    }

    public function store(Request $request)
    {
        // Create the invoice first
        $invoice = Invoice::create([
            'bill_date' => $request->bill_date,
            'delivery_date' => $request->delivery_date,
            'payment_deadline' => $request->payment_deadline,
            'invoice_id' => $request->invoice_id,
            'patient_name' => $request->patient_name,
            'billing_address' => $request->billing_address,
            'contact_info' => $request->contact_info,
            'email' => $request->email,
            'subtotal' => $request->subtotal,
            'vat_total' => $request->vat_total,
            'total_amount' => $request->total_amount,
            'payment_status' => $request->payment_status,
        ]);
    
        // Get the items from the hidden input
        $items = json_decode($request->items, true);
    
        // Create invoice items
        foreach ($items as $item) {
            if (!empty($item['description'])) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'vat' => $item['vat'],
                    'final_amount' => $item['final_amount']
                ]);
            }
        }
    
        return redirect()->route('billing-list')->with('success', 'Invoice created successfully');
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view('show-invoice', compact('invoice'));
    }

    public function edit($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        return view('edit-invoice', compact('invoice'));
    }

    public function update(Request $request, $id)
{
    // Step 1: Validate input
    $validated = $request->validate([
        'description' => 'required|array',
        'description.*' => 'string',
        'quantity' => 'required|array',
        'quantity.*' => 'numeric',
        'price' => 'required|array',
        'price.*' => 'numeric',
        'final_amount' => 'required|array',
        'final_amount.*' => 'numeric',
    ]);

    // Step 2: Retrieve the existing invoice
    $invoice = Invoice::findOrFail($id);

    // Step 3: Update the invoice details
    $invoice->update([
        'bill_date' => $request->bill_date,
        'delivery_date' => $request->delivery_date,
        'payment_deadline' => $request->payment_deadline,
        'patient_name' => $request->patient_name,
        'billing_address' => $request->billing_address,
        'contact_info' => $request->contact_info,
        'email' => $request->email,
        'subtotal' => $request->subtotal,
        'vat_total' => $request->vat_total,
        'total_amount' => $request->total_amount,
        'payment_status' => $request->payment_status,
    ]);

    // Step 4: Delete old items and add new ones
    $invoice->items()->delete();
    foreach ($request->description as $index => $desc) {
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'description' => $desc,
            'quantity' => $request->quantity[$index],
            'price' => $request->price[$index],
            'vat' => $request->vat[$index],
            'final_amount' => $request->final_amount[$index],
        ]);
    }

    return redirect()->route('billing-list')->with('success', 'Invoice updated successfully!');
}


    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->items()->delete();

        $invoice->delete();

        return response()->json([
            'success' => true,
            'message' => 'Invoice deleted successfully!',
        ]);
    }
}
