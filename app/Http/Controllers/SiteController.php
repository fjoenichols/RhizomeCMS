<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Site;

class SiteController extends Controller
{
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->slug),
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:sites,slug|max:255',
            'description' => 'nullable|string|max:1000',
            'theme_color' => 'required|string|in:blue,green,purple',
        ]);

        $request->user()->sites()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Shoot sprouted successfully!');
    }

    public function edit(Site $site)
    {
        if ($site->user_id !== auth()->id()) {
            abort(403);
        }

        return view('sites.edit', compact('site'));
    }

    public function update(Request $request, Site $site)
    {
        if ($site->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'theme_color' => 'required|string|in:blue,green,purple',
        ]);

        $site->update($validated);

        return redirect()->route('dashboard')->with('success', 'Shoot updated successfully!');
    }

    public function destroy(Site $site)
    {
        if ($site->user_id !== auth()->id()) {
            abort(403);
        }

        $site->delete();

        return redirect()->route('dashboard')->with('success', 'Shoot pruned successfully.');
    }
}
