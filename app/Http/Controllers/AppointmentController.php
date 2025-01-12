<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
{
    $appointments = Appointment::all();
    return view('add-appointment', compact('appointments'));
}



public function create(){
    return view('appointments.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'appointment_id' => 'required',
        'patient_id' => 'required',
        'doctor_id' => 'required',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
    ]);

    Appointment::create($validated);
    return redirect()->route('add-appointment')->with('success', 'Appointment created successfully.');
}

public function edit(Appointment $appointment)
{
    return view('appointments.edit', compact('appointment'));
}

public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'appointment_id',
            'patient_id',
            'doctor_id',
            'appointment_date',
            'appointment_time',
            ]);

        $appointment->update($validated);
        return redirect()->route('add-appointment')->with('success', 'Appointment updated successfully.');
    }

    // Remove the specified appointment from the database
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('add-appointment')->with('success', 'Appointment deleted successfully.');
    }
}
