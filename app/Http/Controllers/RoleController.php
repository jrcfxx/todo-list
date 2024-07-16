<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:role',
            'description' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($role, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $role;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $role)
    {
        $request->validate([
            'name' => 'sometimes|required|unique:role,name,' . $role->id,
            'description' => 'required',
        ]);

        $role->update($request->all());

        return response()->json($role, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $role)
    {
        $role->delete();
        return response()->json(null, 204);
    }
}
