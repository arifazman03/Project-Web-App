<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointment = Appointment::all(); // Retrieve all appointment
        return view('appointment', compact('appointments')); // Pass data to the view
    }

    public function store(Request $request)
    {
        $appointment = appointment::create($request->all());
        return response()->json($appointment, 201);
    }

    public function show($id)
    {
        return Appointment::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
        return response()->json($appointment, 200);
    }

    public function destroy($id)
    {
        Appointment::destroy($id);
        return response()->json(null, 204);
    }
}

