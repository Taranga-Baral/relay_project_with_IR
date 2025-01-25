<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SeventhRelay;
use Illuminate\Http\Request;

class Relay7StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seventhRelay = SeventhRelay::orderBy('created_at')->first();
        return $seventhRelay;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the authenticated user is storing

            // Attempt to find the first created seventhRelay record
            $seventhRelay = SeventhRelay::orderBy('created_at')->first();

            if (!$seventhRelay) {
                // If no seventhRelay record exists, create a new one
                $seventhRelay = new SeventhRelay();
                $seventhRelay->is_seventh_relay = true; // Set the initial value
                $seventhRelay->save();
            } else {
                // Toggle the boolean status of is_seventh_relay for the first created record
                $seventhRelay->is_seventh_relay = !$seventhRelay->is_seventh_relay;
                $seventhRelay->save();
            }


            return response()->json(['message' => 'Relay status toggled successfully', 'status' => $seventhRelay->is_seventh_relay], 200);
            // return redirect()->route('controller_dashboard');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
