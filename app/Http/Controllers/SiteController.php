<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:sites,slug|max:255',
        ]);

        $request->user()->sites()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Site created successfully!');
    }
}
