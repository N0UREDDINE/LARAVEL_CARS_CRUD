<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employe;

class employeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = employe::all();
        return view('employe.ListerEmployes', ['employes' => $employes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employe.AjouterEmploye');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newEmploye = employe::create([
            'FirstName' => $request->FN,
            'LastName' => $request->LN,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'Address' => $request->Address,
        ]);
        session()->flash('success', 'Employe Add successfully.');
        return redirect('/employe');
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
    public function edit(employe $employe)
    {
        return view('employe.EditEmploye', [
            'employe' => $employe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employe $employe)
    {
        $employe->update([
            'FirstName' => $request->FN,
            'LastName' => $request->LN,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'Address' => $request->Address,
        ]);
        session()->flash('success', 'Employe updated successfully.');
        return redirect('/employe');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employe $employe)
    {
        $employe->delete();
        session()->flash('success', 'Employe deleted successfully.');
        return redirect('/employe');

    }
}