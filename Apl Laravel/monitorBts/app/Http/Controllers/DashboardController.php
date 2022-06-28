<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Answer;
use App\Models\Btslist;
use App\Models\Survey;
use App\Models\Surveyor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Config;
class DashboardController extends Controller
{
    public function index(Request $request, Config $config){
        if(auth()->guest() || auth()->user()->is_admin !== 1){
            return view('dashboard.surveyor.index', [
                'surveyor' => Surveyor::all(),
                'config' => $config,
                'configs' => Config::all()->first()
            ]);
        }

        // $Btslist = Answer::where('btslist_id', $request->btslist_id);
        // $Survey = Answer::where('survey_id', $request->survey_id);
        // $Question
        // $Laptop = Product::where('product_type','Laptop')->get();
    	// $Phone = Product::where('product_type','Phone')->get();
    	// $Desktop = Product::where('product_type','Desktop')->get();
    	// $laptop_count = count($Laptop);
    	// $phone_count = count($Phone);
    	// $desktop_count = count($Desktop);
    	// return view('echart',compact('laptop_count','phone_count','desktop_count'));

        // foreach($request->)

        return view('dashboard.admin.index', [
            'admin' => Admin::all(),
            'config' => $config,
            'surveys' => Survey::all(),
            'configs' => Config::all()->first()
            // 'btslists' => Answer::where('btslist_id', $request->btslist_id),
            // 'surveys' => Answer::where('survey_id', $request->survey_id),
            // 'questions' => Answer::where('question_id', $request->survey_id)
        ]);

    }
}
