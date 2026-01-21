<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
public function index(Site $site)
{
    // Ensure the user owns this site
    if ($site->user_id !== auth()->id()) abort(403);

    $pages = $site->pages;
    return view('pages.index', compact('site', 'pages'));
}

    public function create(Site $site)
    {
        return view('pages.create', compact('site'));
    }

    public function store(Request $request, Site $site)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255', // We'll automate this later
            'content' => 'required|string',
        ]);

        $site->pages()->create($validated);

        return redirect()->route('sites.pages.index', $site)->with('success', 'Page sprouted!');
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
