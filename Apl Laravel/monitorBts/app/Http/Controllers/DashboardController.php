<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Answer;
use App\Models\Btslist;
use App\Models\Survey;
use App\Models\User;
use App\Models\Mysurvey;
use App\Models\Surveyor;
use App\Models\Monitoring;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;

use App\Models\Config;
Use DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(Request $request, Config $config){
        if(auth()->guest() || auth()->user()->is_admin !== 1){
            return view('dashboard.surveyor.index', [
                'surveyor' => Surveyor::all(),
                'config' => $config,
                'survey_undone' => Mysurvey::where('user_id', auth()->user()->id)->where('status', false),
                'survey_done' => Mysurvey::where('user_id', auth()->user()->id)->where('status', true),
                'configs' => Config::all()->first(),
                'monitorings' => Monitoring::where('user_id', auth()->user()->id)
            ]);
        }

        $answers = DB::table('answers')
        ->selectRaw('count(*) as answer_count, offeredanswer_id')
        ->groupBy('offeredanswer_id')
        ->get();
        $label= array();
        $count = array();
        foreach($answers as $i){
            array_push($label, $i->offeredanswer_id);
            array_push($count, $i->answer_count);

        }


        return view('dashboard.admin.index', [
            'admin' => Admin::all(),
            'config' => $config,
            'surveys' => Survey::all(),
            'btslists' => Btslist::all(),
            'surveyors' => User::where('is_admin', false),
            'configs' => Config::all()->first(),
            'label' => $label,
            'count' => $count

        ]);

    }
}
