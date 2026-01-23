<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $site = app('current_site');
        $pages = $site->pages()->get();

        return view('tenant.home', compact('site', 'pages'));
    }

    public function showPage($tenant, $page_slug)
    {
        $site = app('current_site');
        $pages = $site->pages()->get();
        $page = $site->pages()->where('slug', $page_slug)->firstOrFail();

        return view('tenant.page', compact('site', 'page', 'pages'));
    }
}
