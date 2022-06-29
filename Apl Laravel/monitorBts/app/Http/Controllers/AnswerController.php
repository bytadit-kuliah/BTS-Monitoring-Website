<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Mysurvey;
use App\Models\Btslist;
use App\Models\Monitoring;
use App\Models\Question;
use App\Models\Offeredanswer;
use App\Models\User;
use App\Models\Config;
use Carbon\Carbon;

use DB;
class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Btslist $btslist, User $user, Survey $survey, Monitoring $monitoring)
    {

        $monitorings = Monitoring::where('user_id', auth()->user()->id)->get();

        return view('dashboard.surveyor.answer.index', [

            'btslists' => Btslist::all(),
            'request' => $request,
            'surveys' => Survey::all(),
            'btslist' => $btslist,
            'survey' => $survey,
            'configs' => Config::all()->first(),
            'user' => $user,
            'mysurveys' => Mysurvey::all(),
            'monitorings' => $monitorings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Monitoring $monitoring, Survey $survey, Btslist $btslist)
    {
        $monitorings = Monitoring::where('user_id', auth()->user()->id)->get();

        return view('dashboard.surveyor.answer.create', [

            'btslists' => Btslist::all(),
            'request' => $request,
            'configs' => Config::all()->first(),
            'surveys' => Survey::all(),
            // 'statuses' => Status::all(),
            'mysurveys' => Mysurvey::all(),
            'btslist' => $btslist,
            'survey' => $survey,
            'monitorings' => $monitorings,
            'monitorings2' => Monitoring::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
    public function test(Request $request){
        $answers = DB::table('answers')
        ->selectRaw('count(*) as answer_count, offeredanswer_id')
        ->groupBy('offeredanswer_id')
        ->get();
        $a= array();
        $b = array();
        foreach($answers as $i){
            array_push($a, $i->answer_count);
            array_push($b, $i->offeredanswer_id);
        }
        dd($answers);

        return $answers;
    }
}
