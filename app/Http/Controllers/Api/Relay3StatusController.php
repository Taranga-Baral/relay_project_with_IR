<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ThirdRelay;
use Illuminate\Http\Request;

class Relay3StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thirdRelay = ThirdRelay::orderBy('created_at')->first();
        return $thirdRelay;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure the authenticated user is storing

            // Attempt to find the first created thirdRelay record
            $thirdRelay = ThirdRelay::orderBy('created_at')->first();

            if (!$thirdRelay) {
                // If no thirdRelay record exists, create a new one
                $thirdRelay = new ThirdRelay();
                $thirdRelay->is_third_relay = true; // Set the initial value
                $thirdRelay->save();
            } else {
                // Toggle the boolean status of is_third_relay for the first created record
                $thirdRelay->is_third_relay = !$thirdRelay->is_third_relay;
                $thirdRelay->save();
            }


            return response()->json(['message' => 'Relay status toggled successfully', 'status' => $thirdRelay->is_third_relay], 200);
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
