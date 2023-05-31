@extends('main')

@section('title', 'Add Programs - My Bimble')

@section('breadcrumbs')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Programs</h1>
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
                                Add
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
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <b>Add Programs Data</b>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('programs') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-reply-all"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ url('programs') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name Programs : </label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autocomplete="off" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="edulevels_id">Jenjang Edulavels : </label>
                                        <select name="edulevels_id" id="edulevels_id" class="form-control @error('edulevels_id') is-invalid @enderror">
                                            <option value="">--Pilih--</option>
                                            @foreach ($edulevels as $item)
                                                <option value="{{ $item->id }}"{{ old('edulevels_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('edulevels_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="student_price">Student Price : </label>
                                        <input type="number" name="student_price" id="student_price" class="form-control" autocomplete="off" value="{{ old('student_price') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="student_max">Student Max : </label>
                                        <input type="number" name="student_max" id="student_max" class="form-control" autocomplete="off" value="{{ old('student_max') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="info">Description : </label>
                                        <textarea name="info" id="info" autocomplete="off" class="form-control">{{ old('info') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-check-circle"></i> Save
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection