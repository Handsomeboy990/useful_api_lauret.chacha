<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Module;
use App\Models\UserModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

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
    }

    /**
     * Activate the specified resource.
     */
    public function activate(Request $request)
    {
        //

        $module = Module::find($request->id);
        $userId = Auth::user()->id;

        if(!$module) {
            return response()->json(404);
        }

        UserModule::updateOrCreate(
            [
                'user_id' => $userId,
                'module_id' => $request->id
            ],
            [
                'user_id' => $userId,
                'module_id' => $request->id,
                'active' => true
            ]
        );

        return response()->json(["message" => "Module activated"]);
    }

    /**
     * Desactivate the specified resource.
     */
    public function desactivate(Request $request)
    {
        //
        $module = Module::find($request->id);
        $userId = Auth::user()->id;

        if(!$module) {
            return response()->json(404);
        }

        UserModule::updateOrCreate(
            [
                'user_id' => $userId,
                'module_id' => $request->id
            ],
            [
                'user_id' => $userId,
                'module_id' => $request->id,
                'active' => false
            ]
        );

        return response()->json(["message" => "Module desactivated"]);
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
