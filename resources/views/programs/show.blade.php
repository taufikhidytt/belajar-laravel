@extends('main')

@section('title', 'Detail Programs - My Bimble')

@section('breadcrumbs')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Detail Programs</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li>
                                <a href="{{ url('programs') }}">Programs</a>
                            </li>
                            <li class="active">
                                Detail
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
    <div class="content mt-3">
            <div class="animated fadeIn">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <b>Detail Programs Data</b>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('programs') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-reply-all"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th>No</th>
                                        <td>{{ $program->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenjang Edulevels</th>
                                        <td>{{ $program->edulevels->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name Programs</th>
                                        <td>{{ $program->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Student Price</th>
                                        <td>{{ $program->student_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Student Max</th>
                                        <td>{{ $program->student_max }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $program->info }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $program->created_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection