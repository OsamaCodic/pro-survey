@extends('layouts.master')

@section('title')
    Survey - Questions
@endsection

@section('content')   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <a href="{{url('admin/survey_questions/create?survey_id='.$survey->id)}}" type="button" class="btn btn-info btn-sm">Add more question <i class="fa fa-plus fa-xs" aria-hidden="true"></i></a>
                
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{$survey->title}} - Questions</h3>
                    </div>

                    <div class="card-body">

                        <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Question Type</th>
                                <th>Title</th>
                                {{-- <th>Description</th> --}}
                                <th>Display Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                            <tbody>
                                    @foreach ($survey->surveyQuestions as $surveyQuestion)
                                        <tr>
                                            <td>{{$surveyQuestion->question_type}}</td>
                                            <td>{{$surveyQuestion->title}}</td>
                                            {{-- <td>{{$surveyQuestion->description}}</td> --}}
                                            <td>{{$surveyQuestion->display_order}}</td>
                                            <td>
                                                <a href="{{ url('admin/survey_questions/'.$surveyQuestion->id.'/edit?survey_id='.$survey->id) }}"><i style="color: #e7b00a" class="zoom fa fa-pencil pull-right fa-xs" aria-hidden="true"></i></a>
                                                {{-- <a href="#" onclick="delete_survey({{$survey}})" class="delete" type="button" class="pull-right btn btn-xs btn-danger"><i style="color: #dc3545" class="zoom fa fa-trash pull-right fa-xs" aria-hidden="true"></i></a>  --}}
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        {{-- @if ($surveys->count()==0)
                            <p class="text-center text-danger mt-3">No survey has been found!</p>
                        @endif --}}
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