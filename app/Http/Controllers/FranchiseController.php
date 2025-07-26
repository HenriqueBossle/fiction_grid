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
            'name' => 'required|max:50',
        ]);

        Franchise::create($request->all());

        return redirect()->route('franchises.index')->with('success', 'Franchise create successfully');
    }

    public function show(Franchise $franchise)
    {
        return view('franshises.show', compact('franchise'));
    }

    public function edit(string $id)
    {
        $franchise = Franchise::findOrFail($id);

        return view('franchises.edit', compact('franchise'));
    }

    public function update(Request $request, string $id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->name = $request->name;

        $franchise->save();

        return redirect()->route('franchises.index')->with('success', 'Franchise updated successfully.');
    }

    public function destroy(string $id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();
        return redirect()->route('franchises.index')->with('success', 'Franchise deleted successfully.');
    }

}
