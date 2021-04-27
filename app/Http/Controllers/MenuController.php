<?php


namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Routing\Controller as BaseController;

class MenuController extends BaseController
{
    public function getMenuItems() {
        //throw new \Exception('implement in coding task 3');

        $menus = MenuItem::whereNull('parent_id')
        ->with('childrenmenus')
        ->get();
        return response()->json($menus, 200);
    }
}
