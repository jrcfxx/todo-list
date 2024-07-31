<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Permission::all();
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
            'name' => 'required|unique:permission',
            'description' => 'required',
        ]);

         return Permission::create([
            'name' => $request->name,
            'description' => $request->description,
         ]);


        return response()->json($permission, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $permission)
    {
        return $permission;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $permission)
    {
        $request->validate([
            'name' => 'sometimes|required|unique:permission,name,' . $permission->id,
            'description' => 'required',
        ]);

        $permission->update($request->all());

        return response()->json($permission, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $permission)
    {
        $permission->delete();
        return response()->json(null, 204);
    }
}
