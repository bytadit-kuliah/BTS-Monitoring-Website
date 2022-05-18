<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    public function index(){
        return view('admin.index', [
            'title' => 'Dashboard Admin'
        ]);
    }
}
