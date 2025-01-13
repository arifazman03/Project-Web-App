<?php

namespace App\Http\Controllers;

use App\Models\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicals = DB::table('medical')
        ->orderBy('updated_at', 'asc')
        ->get();

        return view('medical', ['medicals'=>$medicals]);
    }

    public function view_more()
    {
        $medicals = DB::table('medical')
        ->orderBy('updated_at', 'asc')
        ->get();
        return view('view-medical', compact('medicals'));
    }

    public function create()
    {
        return view('add-medical');
    }

    public function store(Request $request)
    {
        $request->validate([
            'record_id' => 'required',
            'patient_name' => 'required',
            'diagnosis' => 'required',
            'treatment' => 'required',
            'doctor' => 'required',
            'date_of_record' => 'required|date',
        ]);

        Medical::create($request->all());

        return redirect()->route('view_medical')->with('success', 'Medical record created successfully.');
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
        $medical = Medical::find($id);
        return view('edit-medical', compact('medicals'));    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
     {
         $request->validate([
             'record_id' => 'required',
             'patient_name' => 'required',
             'diagnosis' => 'required',
             'treatment' => 'required',
             'doctor' => 'required',
             'date_of_record' => 'required|date',
         ]);

         $medical = Medical::findOrFail($id);
         $medical->update($request->all());

         return redirect()->route('view_medical')->with('success', 'Medical record updated successfully');
     }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medical = Medical::findOrFail($id);
        $medical->delete();

        return redirect()->route('view_medical')->with('success', 'Medical record deleted successfully');
    }
}
