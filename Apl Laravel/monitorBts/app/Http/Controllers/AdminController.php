<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(){
        $this->authorize('admin');
        return view('dashboard.admin.index', [
            'admin' => admin::all(),
            'configs' => Config::all()->first()
        ]);
    }
}
