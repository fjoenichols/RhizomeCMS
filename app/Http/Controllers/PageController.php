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

    public function edit(Site $site, Page $page)
    {
        // Authorization check
        if ($site->user_id !== auth()->id()) abort(403);
        
        return view('pages.edit', compact('site', 'page'));
    }

    public function update(Request $request, Site $site, Page $page)
    {
        if ($site->user_id !== auth()->id()) abort(403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id . ',id,site_id,' . $site->id,
            'content' => 'required|string',
        ]);

        $page->update($validated);

        return redirect()->route('sites.pages.index', $site)->with('success', 'Page updated!');
    }

    public function destroy(Site $site, Page $page)
    {
        if ($site->user_id !== auth()->id()) abort(403);

        $page->delete();

        return redirect()->route('sites.pages.index', $site)->with('success', 'Page removed.');
    }
}
