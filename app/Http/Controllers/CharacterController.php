<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Franchise;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
            $franchiseId = $request->query('franchise_id');

    $characters = Character::with('franchise')
        ->when($franchiseId, function ($query, $franchiseId) {
            return $query->where('franchise_id', $franchiseId);
        })
        ->get();

    $franchises = Franchise::all();

    return view('characters.index', compact('characters', 'franchises', 'franchiseId'));
    }
    
    public function create()
    {
        $franchises = Franchise::all(); 
        return view('characters.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:1000',
            'franchise_id' => 'required|exists:franchises,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);


        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Character::create([
        'name' => $request->name,
        'description' => $request->description,
        'franchise_id' => $request->franchise_id,
        'image' => 'images/' . $imageName
        ]);

        return redirect()->route('characters.index')->with('success', 'Character create successfully');
    }

    public function show($id)
    {
       $character = Character::with('franchise')->findOrFail($id);
       return view('characters.show', compact('character'));
    }

    public function edit(string $id)
    {
        $character = Character::findOrFail($id);
        $franchises = Franchise::All();
        return view('characters.edit', compact('character', 'franchises'));
    }

    public function update(Request $request, string $id)
    {
        $character = Character::findOrFail($id);

        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:1000',
            'franchise_id' => 'required|exists:franchises,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $character->name = $request->name;
        $character->description = $request->description;
        $character->franchise_id = $request->franchise_id;
        
        if(!is_null($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $character->image = 'images/'.$imageName;
        }

        $character->save();

        return redirect()->route('characters.index')->with('success', 'Character updated successfully.');
    }

    public function destroy(string $id)
    {
        $character = Character::findOrFail($id);
        $character->delete();
        return redirect()->route('characters.index')->with('success', 'Character deleted successfully.');
    }

}
