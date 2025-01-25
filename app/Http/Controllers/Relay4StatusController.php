<?php

namespace App\Http\Controllers;

use App\Models\FourthRelay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Relay4StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fourthRelay = FourthRelay::all();
        return $fourthRelay;
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
        // Ensure the authenticated user is storing
        if (Auth::check()) {
            // Attempt to find the first created fourthRelay record
            $fourthRelay = FourthRelay::orderBy('created_at')->first();

            if (!$fourthRelay) {
                // If no fourthRelay record exists, create a new one
                $fourthRelay = new FourthRelay();
                $fourthRelay->is_fourth_relay = true; // Set the initial value
                $fourthRelay->save();
            } else {
                // Toggle the boolean status of is_fourth_relay for the first created record
                $fourthRelay->is_fourth_relay = !$fourthRelay->is_fourth_relay;
                $fourthRelay->save();
            }

            // Optionally, return a response indicating success or provide any necessary data
            // return response()->json(['message' => 'Relay status toggled successfully', 'status' => $fourthRelay->is_fourth_relay], 200);
            return redirect()->back();
            // return redirect()->route('controller_dashboard');

        }

        // Handle if user is not authenticated (optional)
        return response()->json(['error' => 'Unauthorized'], 401);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
