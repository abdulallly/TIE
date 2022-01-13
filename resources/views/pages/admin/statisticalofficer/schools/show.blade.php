@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6 class="m-0">Dashboard</h6>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Schools Management</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-header">
                Schools Details
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped bg-light table-sm">
                    <thead>
                    <tr>
                        <th>Name of Regions</th>
                        <th>Name of Councils</th>
                        <th>Name of Schools</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $schools->region}}</td>
                        <td>{{ $schools->council}}</td>
                        <td>{{ $schools->name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection





