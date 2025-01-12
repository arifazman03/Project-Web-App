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
        return view('medical');  // Return a view medical page
    }

    public function view_more()
    {
        return view('view-medical');
    }

    public function create()
    {
        return view('add-medical');
    }
}
