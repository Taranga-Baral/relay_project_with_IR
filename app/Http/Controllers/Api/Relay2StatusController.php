<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SecondRelay;
use Illuminate\Http\Request;

class Relay2StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secondRelay = SecondRelay::orderBy('created_at')->first();
        return $secondRelay;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the authenticated user is storing

            // Attempt to find the first created secondRelay record
            $secondRelay = SecondRelay::orderBy('created_at')->first();

            if (!$secondRelay) {
                // If no secondRelay record exists, create a new one
                $secondRelay = new SecondRelay();
                $secondRelay->is_second_relay = true; // Set the initial value
                $secondRelay->save();
            } else {
                // Toggle the boolean status of is_second_relay for the first created record
                $secondRelay->is_second_relay = !$secondRelay->is_second_relay;
                $secondRelay->save();
            }


            return response()->json(['message' => 'Relay status toggled successfully', 'status' => $secondRelay->is_second_relay], 200);
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
