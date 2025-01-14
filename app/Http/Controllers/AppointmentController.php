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

public function show($id)
    {
        // Add your logic here to show a specific appointment
        // For example:
        $appointment = Appointment::findOrFail($id);
        return view('appointments.show', compact('appointments'));
    }
public function create(){
    return view('create-appointment');
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
    return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
}

public function edit(Appointment $appointment)
{
    return view('appointments.edit', compact('appointments'));
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

            $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        $appointment->update($validated);
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    // Remove the specified appointment from the database
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
