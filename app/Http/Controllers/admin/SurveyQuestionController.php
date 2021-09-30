<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyQuestion;
use App\Models\Survey;
use Session;

class SurveyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey = Survey::where('id', $_GET['survey_id'])->first();   
        return view('admin.questions.index', compact('survey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $survey = Survey::where('id', $_GET['survey_id'])->first();
        $form_action= url('admin/survey_questions');
        $form_method="POST";
        $form_btn = 'Add';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        return view('admin.questions.create',compact(
            'survey',
            'form_action',
            'form_method',
            'form_btn',
            'form_btn_icon',
            'form_btn_class',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SurveyQuestion::create($request->except('_token'));
        return response([
            'redirect_url' => url('admin/survey_questions?survey_id='.$request->survey_id),
            'status' => 'Question added successfully!'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey_question = SurveyQuestion::find($id);

        if ($survey_question)
        {
            $form_action=url('admin/survey_questions/'.$id);
            $form_method="PUT";
            $form_btn = 'Update';
            $form_btn_icon = 'fa fa-repeat';
            $form_btn_class = 'btn-warning';
        }

        return view('admin.questions.create', compact('survey_question', 'form_action', 'form_method','form_btn', 'form_btn_class', 'form_btn_icon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $survey_question = SurveyQuestion::find($id);
        $survey_question->update($request->except('_token'));
        return response([
            'redirect_url' => url('admin/survey_questions?survey_id='.$request->survey_id),
            'status' => 'Question updated successfully!'
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey_question = SurveyQuestion::find($id)->delete();
    }

    public function question_answers(Request $request)
    {
        // All answers        
        dd($request->answer_arr);
        
    }
}
