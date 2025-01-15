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

    $appointment = new Appointment();
        $appointment->appointment_id = $request->appointment_id;
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->save();

    Appointment::create($validated);
    return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
}

public function edit(Appointment $appointment)
{
    return view('edit-appointment', compact('appointments'));
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
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    // Remove the specified appointment from the database
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
