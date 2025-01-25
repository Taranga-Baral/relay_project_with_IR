<?php

namespace App\Http\Controllers;

use App\Models\FirstRelay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Relay1StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the single instance of FirstRelay
    $firstRelay = FirstRelay::first();

    // Check if $firstRelay exists to avoid errors
    if ($firstRelay) {
        // Extract the is_first_relay value
        $isFirstRelayValue = $firstRelay->is_first_relay;
    } else {
        // Default value if no record exists or handle as per your application logic
        $isFirstRelayValue = null;
    }

        return view('first_relay.index',compact('isFirstRelayValue'));
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

            // Optionally, return a response indicating success or provide any necessary data
            // return response()->json(['message' => 'Relay status toggled successfully', 'status' => $firstRelay->is_first_relay], 200);
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
