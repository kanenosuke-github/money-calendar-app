<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index',compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'schedule' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'time' => 'nullable|date_format:H:i',
            'memo' => 'nullable|string',
        ]);

        Schedule::create($validated);
        return redirect()->route('schedules.index');
    }
}
