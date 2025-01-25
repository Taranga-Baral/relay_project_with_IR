<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EighthRelay;
use Illuminate\Http\Request;

class Relay8StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eighthRelay = EighthRelay::orderBy('created_at')->first();
        return $eighthRelay;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the authenticated user is storing

            // Attempt to find the first created eighthRelay record
            $eighthRelay = EighthRelay::orderBy('created_at')->first();

            if (!$eighthRelay) {
                // If no eighthRelay record exists, create a new one
                $eighthRelay = new EighthRelay();
                $eighthRelay->is_eighth_relay = true; // Set the initial value
                $eighthRelay->save();
            } else {
                // Toggle the boolean status of is_eighth_relay for the first created record
                $eighthRelay->is_eighth_relay = !$eighthRelay->is_eighth_relay;
                $eighthRelay->save();
            }


            return response()->json(['message' => 'Relay status toggled successfully', 'status' => $eighthRelay->is_eighth_relay], 200);
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
