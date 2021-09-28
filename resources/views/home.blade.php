@extends('layouts.master')
@section('title')
    Dashboard
@endsection
{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h3 class="mt-3"><strong>Modules</strong></h3>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <a href="{{url('admin/survey')}}" type="button" class="btn btn-secondary btn-block">Surveys</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" type="button" class="btn btn-secondary btn-block">History</a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <a href="#" type="button" class="btn btn-secondary btn-block">Questions</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" type="button" class="btn btn-secondary btn-block">Settings</a>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
