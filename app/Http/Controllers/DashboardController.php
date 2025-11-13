<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        // Total menu
        $totalMenu = Menu::count();

        // Menu terlaris
        $topMenus = Menu::orderBy('sold', 'desc')
                        ->take(3)
                        ->get();

        // Insight otomatis
        $noImageCount = Menu::whereNull('image')->count();
        $noDescriptionCount = Menu::whereNull('description')->orWhere('description', '')->count();
        $avgPrice = Menu::avg('price');

        return view('dashboard', compact(
            'totalMenu',
            'topMenus',
            'noImageCount',
            'noDescriptionCount',
            'avgPrice'
        ));
    }
}
