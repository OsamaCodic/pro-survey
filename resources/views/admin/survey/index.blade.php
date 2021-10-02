@extends('layouts.master')

@section('title')
    Survey
@endsection

@section('content')   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <a href="{{url('admin/survey/create')}}" type="button" class="btn btn-info btn-sm">Create Survey <i class="fa fa-plus fa-xs" aria-hidden="true"></i></a>
                
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Surveys</h3>
                    </div>
                    
                    <div class="card-body">
                        @if ($surveys->count() > 0)
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-2 pt-2 pl-4">
                                    <small id="checkbox_delete_Label" class="text-secondary"><b>Delete Selected rows</b></small>
                                </div>
                                <div class="col-md-1">
                                    <div class="pull-right">
                                        <label class="switch">
                                            <input class="toggle-class" type="checkbox" id="delete_selected" onclick="deleletCheckboxes()">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <table id="surveyTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th colspan="10%">Name</th>
                                    <th colspan="30%">Description</th>
                                    <th colspan="14%">Display Order</th>
                                    <th colspan="6%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey) 
                                    <tr>
                                        <td colspan="10%">{{$survey->title}}</td>
                                        <td colspan="30%">{{$survey->description}}</td>
                                        <td colspan="14%">{{$survey->display_order}}</td>
                                        <td colspan="6%">
                                            <a href="{{url('admin/survey_questions?survey_id='.$survey->id)}}" type="button" class="zoom btn btn-info btn-xs" style="font-size: 8px;">Open</a>
                                            <a href="{{ url('admin/survey/'.$survey->id.'/edit') }}"><i style="color: #e7b00a" class="zoom fa fa-pencil pull-right fa-xs" aria-hidden="true"></i></a>
                                            <a href="#" onclick="delete_survey({{$survey}})" class="delete" type="button" class="pull-right btn btn-xs btn-danger"><i style="color: #dc3545" class="zoom fa fa-trash pull-right fa-xs" aria-hidden="true"></i></a>
                                            <input class="form-check-input zoom" type="checkbox" id="delete_rows" name="delete_rows[]" value="{{$survey->id}}" style="margin-left: 5px; margin-top: 7px; display:none">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <div class="row">
                            <div class="col-md-11" style="max-width: 90.666667%;"></div>
                                <div class="col-md-1">
                                    <a href="#" type="button" id="del_rows_btn" class="zoom btn btn-danger btn-xs mt-2 btn-block" style="font-size: 8px; display:none;">Delete</a>
                                </div>
                            </div>   
                            @if ($surveys->count()==0)
                                <p class="text-center text-danger mt-3">No survey has been found!</p>
                            @endif
                        </div>
                    
                    </div>
                    <!-- /card-body -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    @include('admin.survey.partials.js')
@endsection