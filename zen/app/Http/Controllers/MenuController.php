<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::get();
        return view('menu', compact('menus'));
    }
}
