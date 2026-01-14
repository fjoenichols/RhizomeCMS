<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $site = app('current_site');
        return response()->json([
            'site_name' => $site->name,
            'owner' => $site->user->name,
            'message' => "Welcome to the Rhizome."
        ]);
    }
}
