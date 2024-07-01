<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;

class ApiController extends Controller
{
    public function trackVisit($externalId)
    {
        $visit = Visit::firstOrNew(['external_id' => $externalId]);

        $visit->fill([
            'stage' => 'visited',
            'updated_at' => now(),
        ])->save();

        return response()->json([], 200);
    }

    public function updateUserStage(Request $request)
    {
        $validatedData = $request->validate([
            'externalId' => 'required|string',
            'stage' => 'required|string|in:visited,viewed_page,searched',
        ]);

        Visit::updateOrCreate(
            ['external_id' => $validatedData['externalId']],
            ['stage' => $validatedData['stage'], 'updated_at' => now()]
        );

        return response()->json([], 200);
    }
}
