<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FourthRelay;
use Illuminate\Http\Request;

class Relay4StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fourthRelay = FourthRelay::orderBy('created_at')->first();
        return $fourthRelay;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the authenticated user is storing

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


            return response()->json(['message' => 'Relay status toggled successfully', 'status' => $fourthRelay->is_fourth_relay], 200);
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
