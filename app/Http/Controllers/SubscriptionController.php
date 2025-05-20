<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|min:10|unique:subscriptions,email',
        ]);

        $ipAddress = $request->ip();

        Subscription::create([
            'email' => $request->email,
            'ip_address' => $ipAddress,
        ]);

        return response()->json(['message' => 'Subscribed successfully'], 201);
    }
}
