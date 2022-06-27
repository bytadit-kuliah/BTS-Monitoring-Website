<?php

namespace App\Http\Controllers;

use App\Models\Mysurvey;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Survey;
// use App\Models\Status;
use App\Models\Btslist;
use App\Models\Monitoring;
use App\Models\Question;
use App\Models\Offeredanswer;
use App\Models\User;
class MysurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Btslist $btslist, User $user, Survey $survey, Monitoring $monitoring)
    {
        $monitorings = Monitoring::where('user_id', auth()->user()->id)->get();

        return view('dashboard.surveyor.mysurvey.index', [
            'btslists' => Btslist::all(),
            'request' => $request,
            'surveys' => Survey::all(),
            'btslist' => $btslist,
            'survey' => $survey,
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mysurvey  $mysurvey
     * @return \Illuminate\Http\Response
     */
    public function show(Mysurvey $mysurvey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mysurvey  $mysurvey
     * @return \Illuminate\Http\Response
     */
    public function edit(Mysurvey $mysurvey, Request $request, Btslist $btslist, User $user, Survey $survey, Monitoring $monitoring)
    {
        $monitorings = Monitoring::where('user_id', auth()->user()->id)->get();

        return view('dashboard.surveyor.mysurvey.edit', [
            'btslists' => Btslist::all(),
            'request' => $request,
            'surveys' => Survey::all(),
            'btslist' => $btslist,
            'survey' => $survey,
            'questions' => Question::all(),
            'offeredanswers' => Offeredanswer::all(),
            'user' => $user,
            // 'statuses' => Status::all(),
            'mysurveys' => Mysurvey::all(),
            'mysurvey' => $mysurvey,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mysurvey  $mysurvey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mysurvey $mysurvey, Answer $answer)
    {
        if($mysurvey->status == false){
            foreach($request->question_id as $key=>$question){
                $answer = new Answer;
                $answer->btslist_id = $request->btslist_id;
                $answer->user_id = $request->user_id;
                $answer->survey_id = $request->survey_id;
                $answer->question_id = $question;
                $answer->offeredanswer_id = $request->offeredanswer_id[$key];
                $answer->save();
                // dd($question);
            };
            $surveyku = Mysurvey::find($mysurvey->id);
            $surveyku->status = true;
            $surveyku->update();
        }else{
            Answer::where('btslist_id', $mysurvey->btslist_id)->where('user_id', $mysurvey->user_id)->where('survey_id', $mysurvey->survey_id)->delete();
            foreach($request->question_id as $key=>$question){
                // $surveyku = Answer::where('btslist_id', $mysurvey->btslist_id)->where('user_id', $mysurvey->user_id)->where('survey_id', $mysurvey->survey_id);
                // $surveyku->btslist_id = $request->btslist_id;
                // $surveyku->user_id = $request->user_id;
                // $surveyku->survey_id = $request->survey_id;
                // $surveyku->question_id = $question;
                // $surveyku->offeredanswer_id = $request->offeredanswer_id[$key];
                // $surveyku->update();
                $answer = new Answer;
                $answer->btslist_id = $request->btslist_id;
                $answer->user_id = $request->user_id;
                $answer->survey_id = $request->survey_id;
                $answer->question_id = $question;
                $answer->offeredanswer_id = $request->offeredanswer_id[$key];
                $answer->save();
            }
        }

        // dd($mysurvey->status);

        // $surveyku = new Mysurvey;
        // $surveyku
        return redirect('/dashboard/mysurveys')->with('success', 'Survey Berhasil diisi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mysurvey  $mysurvey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mysurvey $mysurvey)
    {
        //
    }
}
