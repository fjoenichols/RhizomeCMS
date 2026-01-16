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
            'shoot_name' => $site->name,
            'description' => $site->description ?? 'No description yet.',
            'theme_color' => $site->theme_color,
            'owner' => $site->user->name,
        ]);
    }
}
