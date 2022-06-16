<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Surveyor;

class SurveyorController extends Controller
{
    public function index(){
        $this->authorize('surveyor');
        return view('dashboard.surveyor.index', [
            'surveyor' => surveyor::all()
        ]);
    }
}
