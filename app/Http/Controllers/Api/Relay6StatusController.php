<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SixthRelay;
use Illuminate\Http\Request;

class Relay6StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sixthRelay = SixthRelay::orderBy('created_at')->first();
        return $sixthRelay;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the authenticated user is storing

            // Attempt to find the first created sixthRelay record
            $sixthRelay = SixthRelay::orderBy('created_at')->first();

            if (!$sixthRelay) {
                // If no sixthRelay record exists, create a new one
                $sixthRelay = new SixthRelay();
                $sixthRelay->is_sixth_relay = true; // Set the initial value
                $sixthRelay->save();
            } else {
                // Toggle the boolean status of is_sixth_relay for the first created record
                $sixthRelay->is_sixth_relay = !$sixthRelay->is_sixth_relay;
                $sixthRelay->save();
            }


            return response()->json(['message' => 'Relay status toggled successfully', 'status' => $sixthRelay->is_sixth_relay], 200);
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
