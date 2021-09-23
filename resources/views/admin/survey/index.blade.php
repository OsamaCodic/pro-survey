@extends('layouts.master')

@section('title')
    Survey
@endsection

@section('content')   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <a href="{{url('admin/survey/create')}}" type="button" class="btn btn-info btn-sm">Create Survey <i class="fa fa-plus" aria-hidden="true"></i></a>
                
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Surveys</h3>
                    </div>
                    <!-- card-body -->

                    <div class="card-body">
                        <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet Explorer 4.0</td>
                                    <td>n/a</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection