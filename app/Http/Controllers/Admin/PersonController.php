<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::where('status', true)
        ->get();

        return view('admin.people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:people'
        ]);

        $person = Person::create($request->all());


        return redirect()->route('admin.people.edit', $person)->with('info','la persona se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('admin.people.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $status = [
            '1' => 'Activo',
            '2' => 'Inactivo'
        ];

        return view('admin.people.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $request->validate([
            'name'=>'required',
            'email'=>"required|unique:people,email,$person->id"
        ]);

        $person->update($request->all());


        return redirect()->route('admin.people.edit', $person)->with('info','la persona se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        
        $person->delete();
        return redirect()->route('admin.people.index')->with('info','la persona se eliminó con éxito');
    }
}
