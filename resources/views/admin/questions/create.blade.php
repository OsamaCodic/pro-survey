@extends('layouts.master')

@section('title')
    Add Question
@endsection

@section('content')   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- <div class="card @if (@$survey) card-warning @else card-success @endif mt-3"> --}}
                <div class="card card-default card-success mt-3">
                    <div class="card-header">
                        {{-- <h3 class="card-title">@if (@$survey) Edit Survey @else Create Survey @endif </h3> --}}
                        <h3 class="card-title">Add Question</h3>
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