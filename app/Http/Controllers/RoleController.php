<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles =Role::paginate(10); 

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('roles.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Store role data
        Role::create($validated);

        // Redirect with success message
        return redirect()->route('roles.index')->with('success', 'Role added successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($roleId)
    {
        $role = Role::findOrFail($roleId);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $roleId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::find($roleId);
        $role->update($validated);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $roleId)
    {
        
        $role = Role::find($roleId);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
