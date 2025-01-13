<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all(); // Retrieve all patients
        return view('patient', compact('patients')); // Pass data to the view
    }

    public function create()
    {
        return view('add-patient'); // Return the view for adding a new patient
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id); // Retrieve the patient by ID
        return view('edit-patient', compact('patient')); // Pass the patient data to the edit view
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $patients = Patient::where('patient_name', 'LIKE', "%{$query}%")->get(); // Search patients by name
        return view('patient', compact('patients')); // Return the view with search results
    }

    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        return redirect()->route('patients.index'); // Redirect to the index route
    }

    public function show($id)
    {
        return Patient::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return response()->json($patient, 200);
    }

    public function destroy($id)
    {
        Patient::destroy($id);
        return response()->json(null, 204);
    }
}
