@extends('layouts.master')

@section('title')
    Create Survey
@endsection

@section('content')   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card @if (@$survey) card-warning @else card-success @endif mt-3">
                    <div class="card-header">
                        <h3 class="card-title">@if (@$survey) Edit Survey @else Create Survey @endif </h3>
                    </div>
                    @include('admin.survey.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @include('admin.survey.partials.js')
@endsection