<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FirstRelay;
use Illuminate\Http\Request;

class Relay1StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $firstRelay = FirstRelay::orderBy('created_at')->first();
        return $firstRelay;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the authenticated user is storing

            // Attempt to find the first created FirstRelay record
            $firstRelay = FirstRelay::orderBy('created_at')->first();

            if (!$firstRelay) {
                // If no FirstRelay record exists, create a new one
                $firstRelay = new FirstRelay();
                $firstRelay->is_first_relay = true; // Set the initial value
                $firstRelay->save();
            } else {
                // Toggle the boolean status of is_first_relay for the first created record
                $firstRelay->is_first_relay = !$firstRelay->is_first_relay;
                $firstRelay->save();
            }


            return response()->json(['message' => 'Relay status toggled successfully', 'status' => $firstRelay->is_first_relay], 200);
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
