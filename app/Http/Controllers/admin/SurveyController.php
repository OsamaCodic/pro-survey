<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey;
use Session;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $surveys = Survey::orderBy('display_order', 'ASC')->get();

        return view('admin.survey.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_action=url('admin/survey');
        $form_method="POST";
        $form_btn = 'Create';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        return view('admin.survey.create', compact('form_action', 'form_method', 'form_btn', 'form_btn_class', 'form_btn_icon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Survey::create($request->except('_token'));
        
        Session::flash('success', 'Survey created successfully!');
        return response([
            'redirect_url' => url('admin/survey')
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
        $survey = Survey::find($id);

        if ($survey)
        {
            $form_action=url('admin/survey/'.$id);
            $form_method="PUT";
            $form_btn = 'Update';
            $form_btn_icon = 'fa fa-repeat';
            $form_btn_class = 'btn-warning';
        }

        return view('admin.survey.create', compact('form_action', 'form_method', 'survey','form_btn', 'form_btn_class', 'form_btn_icon'));
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
        $survey = Survey::find($id);
        $survey->update($request->except('_token'));

        Session::flash('success', 'Survey updated successfully!');
        return response([
            'redirect_url' => url('admin/survey')
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
        Survey::find($id)->delete();
        Session::flash('toast_success', 'Survey deleted successfully!');
    }
}
