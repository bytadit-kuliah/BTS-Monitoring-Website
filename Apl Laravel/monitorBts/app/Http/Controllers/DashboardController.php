<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Surveyor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(){
        if(auth()->guest() || auth()->user()->is_admin !== 1){
            return view('dashboard.surveyor.index', [
                'surveyor' => Surveyor::all()
            ]);
        }
        return view('dashboard.admin.index', [
            'admin' => Admin::all()
        ]);
    }
}
