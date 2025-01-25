<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FifthRelay;
use Illuminate\Http\Request;

class Relay5StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fifthRelay = FifthRelay::orderBy('created_at')->first();
        return $fifthRelay;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the authenticated user is storing

            // Attempt to find the first created fifthRelay record
            $fifthRelay = FifthRelay::orderBy('created_at')->first();

            if (!$fifthRelay) {
                // If no fifthRelay record exists, create a new one
                $fifthRelay = new FifthRelay();
                $fifthRelay->is_fifth_relay = true; // Set the initial value
                $fifthRelay->save();
            } else {
                // Toggle the boolean status of is_fifth_relay for the first created record
                $fifthRelay->is_fifth_relay = !$fifthRelay->is_fifth_relay;
                $fifthRelay->save();
            }


            return response()->json(['message' => 'Relay status toggled successfully', 'status' => $fifthRelay->is_fifth_relay], 200);
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
