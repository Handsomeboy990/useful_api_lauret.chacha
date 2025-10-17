<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Module;
use App\Models\UserModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  $module = Module::all();

         $module = UserModule::where('user_id', '=', Auth::user()->id)
            ->where('active', '=', true)
            ->join('modules', 'module_id', '=', 'modules.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('module_id AS id', 'modules.name', 'modules.description')
            ->get(); 
        return $module;
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
