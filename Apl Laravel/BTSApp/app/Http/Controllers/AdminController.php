<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\admin;
use App\Models\surveyor;



class AdminController extends Controller
{
    public function index(){
        // $this->authorize('admin');
        // return view('dashboard.admin.index', [
        //     'admin' => admin::all()
        // ]);

        if(auth()->guest() || auth()->user()->is_admin !== 1){
            return view('dashboard.surveyor.index', [
                'surveyor' => surveyor::all()
            ]);
        }
        return view('dashboard.admin.index', [
            'admin' => admin::all()
        ]);
    }
}
