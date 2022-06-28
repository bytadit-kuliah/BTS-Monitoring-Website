<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Survey;
// use App\Models\Status;
use App\Models\Mysurvey;
use App\Models\Btslist;
use App\Models\Monitoring;
use App\Models\Question;
use App\Models\Offeredanswer;
use App\Models\User;
use App\Models\Config;

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
        // $monitoring = Monitoring::where('user_id', $user->id);
        // return view('dashboard.surveyor.answer.index', [
        //     'surveys' => Survey::all(),
        //     // 'surveys' => $survey->btslist()->where('btslist_id', $monitoring->btslist_id),
        //     // 'surveys' => DB::table('btslist_survey')->where('btslist_id', '=', $monitoring->btslist_id),
        //     'survey' => $survey,
        //     'monitorings' => Monitoring::where('user_id', auth()->user()->id),
        //     'btslists' => Btslist::all(),
        //     'btslist' => $btslist,
        //     // 'questions' => Question::where('survey_id', $survey->id)->get(),
        //     // 'offeredanswers' => Offeredanswer::where('question_id', $question->id)->get(),
        //     // 'offeredanswer' => $offeredanswer,
        //     'request' => $request
        // ]);

        // $surveys=Survey::when($request->has("nama"),function($q)use($request){
        //     return $q->where("nama","like","%".$request->get("nama")."%");
        // })->paginate(5);
        // $total_data=$surveys->count();
        // if($request->ajax()){
        //     return view('dashboard.surveyor.survey.btsdata ',[
        //         // 'surveys' => survey::all(),
        //         'surveys' => $surveys,
        //         'total_card' => $total_data,
        //         // 'survey' => $survey,
        //         'btsphotos' => Btsphoto::where('survey_id', $survey->id)->get(),
        //         // 'firstPhoto' => $btsphoto->where('survey_id', $survey->id)->get(),
        //         'btsphoto' => $btsphoto
        //     ]);
        // }
        // return view('dashboard.admin.btslist.index', [
        //     // 'btslists' => Btslist::all(),
        //     'btslists' => $btslists,
        //     'total_card' => $total_data,
        //     // 'btslist' => $btslist,
        //     'btsphotos' => Btsphoto::where('btslist_id', $btslist->id)->get(),
        //     // 'firstPhoto' => $btsphoto->where('btslist_id', $btslist->id)->get(),
        //     'btsphoto' => $btsphoto
        // ]);

        $monitorings = Monitoring::where('user_id', auth()->user()->id)->get();

        // foreach($surveys as $survey){
        //     return $survey->btslists;
        // } //dapet data btslist
        // foreach($btslists as $btslist){
        //     return $btslist->surveys;
        // }//dapet data survey




        // $btslists = Btslist::all();
        // $surveys = Survey::all();
        // // return $surveys;
        // // return $btslists;
        // $data = [];
        // foreach($btslists as $btslist){
        //     $data[] =  $btslist->surveys;
        // }
        // return $data;



        return view('dashboard.surveyor.answer.index', [

            'btslists' => Btslist::all(),
            'request' => $request,
            'surveys' => Survey::all(),
            'btslist' => $btslist,
            'survey' => $survey,
            'configs' => Config::all()->first(),
            'user' => $user,
            // 'statuses' => Status::all(),
            'mysurveys' => Mysurvey::all(),
            'monitorings' => $monitorings
            // 'monitoring' => $monitoring
            // 'villages' => Village::where('kecamatan_id', '1')->get(),
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
            // 'providers' => Provider::all(),
            // 'selected' => print_r($request->kecamatan_id)
            // 'selectedKecamatan' => Kecamatan::first()->kecamatan_id,
            // 'value' => $request->kecamatan_id
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

        // foreach($surveys as $survey){
        //     return $survey->btslists;
        // } //dapet data btslist
        // foreach($btslists as $btslist){
        //     return $btslist->surveys;
        // }//dapet data survey
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
            // 'monitoring' => $monitoring
            // 'villages' => Village::where('kecamatan_id', '1')->get(),
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
            // 'providers' => Provider::all(),
            // 'selected' => print_r($request->kecamatan_id)
            // 'selectedKecamatan' => Kecamatan::first()->kecamatan_id,
            // 'value' => $request->kecamatan_id
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
        // ->where('btslist_id', '=', 5)
        ->groupBy('offeredanswer_id')
        ->get();
        $a= array();
        $b = array();
        foreach($answers as $i){
            array_push($a, $i->answer_count);
            array_push($b, $i->offeredanswer_id);

            // dd($i->answer_count, $i->offeredanswer_id);
        }
        dd($answers);

        return $answers;
    }
}
