<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modules = Module::all();
        return $modules;
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
        //
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string']
            ]);
        } catch (Exception) {
            return new Exception;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
        return $module;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
