<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class DashboardController extends Controller
{
    public function show()
    {
        $totalVisitors = Visit::count();


        $stages = Visit::distinct()->pluck('stage');

        $visitorStages = $stages->mapWithKeys(function ($stage) {
            return [$stage => Visit::where('stage', $stage)->count()];
        });

        return view('dashboard', compact('totalVisitors', 'visitorStages'));
    }


}
