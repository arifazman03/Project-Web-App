<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointment = DB::table('appointment')
        ->orderBy('updated_at', 'asc')
        ->get();

        return view('appointment', ['appointment'=>$appointment]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-appointment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'appointment_id',
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointment.index')->with('success', 'Doctor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment = Appointment::find($id);
        return view('edit-appointment', compact('appointment'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'appointment_id',
            'patient_id',
            'doctor_id',
            'appointment_date',
            'appointment_time',
            ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        return redirect()->route('appointment.index')->with('success', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('doctor.index')->with('success', 'Doctor deleted successfully');
    }
}
