@extends('layouts.master')

@section('title')
    Add Question
@endsection

@section('content')   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card @if (@$survey_question) card-warning @else card-success @endif mt-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            @if (@$survey_question)
                                Edit Question
                            @else
                                @if(@$survey)
                                    @if ($survey->surveyQuestions->count() > 0)
                                        {{$survey->title}} - Next Question
                                    @else
                                        Add Question
                                    @endif
                                @endif
                            @endif
                        </h3>
                    </div>
                    @include('admin.questions.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('admin.questions.partials.js')
@endsection