<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::all();
        return view('franchises.index', compact('franchises'));
    }
    
    public function create()
    {
        return view('franchises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Franchise::create($request->all());

        return redirect()->route('franchises.index')->with('success', 'Franchise create successfully');
    }

    public function show(Franchise $franchise)
    {
        return view('franshises.show', compact('franchise'));
    }

    public function edit(Franchise $franchise)
    {
        return view('franchises.edit', compact('franchise'));
    }

    public function update(Request $request, Franchise $franchise)
    {
        $request->validade([
            'name' => 'required',
        ]);

        $franchise->updade($request->all());

        return redirect()->route('franchises.index')->with('success', 'Franchise updated successfully.');
    }

    public function destroy(Franchise $franchise)
    {
        $franchise->delete();
        return redirect()->route('franchises.index')->with('success', 'Franchise deleted successfully.');
    }

}
