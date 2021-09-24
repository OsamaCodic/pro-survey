@extends('layouts.master')

@section('title')
    Create Survey
@endsection

@section('content')   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Create Survey</h3>
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