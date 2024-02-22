<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;

class MenuController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::with('menuItems')->get();
        return view('menu.index', compact('categories'));
    }
}
