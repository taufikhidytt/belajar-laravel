@extends('main')

@section('title', 'Programs - My Bimble')

@section('breadcrumbs')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Programs</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">
                                <i class="fa fa-puzzle-piece"></i>
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
                            <b>Programs Data</b>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('programs/create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>No</th>
                                <th>Jenjang Edulevels</th>
                                <th>Name Programs</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($programs as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->edulevels->name }}</td>
                                <td>
                                    <a href="{{ url('programs/'.$item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-eye"></i> See
                                    </a>    |
                                    <a href="{{ url('programs/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Update
                                    </a>    |
                                    <form action="{{ url('programs/'.$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection