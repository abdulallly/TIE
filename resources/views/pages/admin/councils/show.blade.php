@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Councils Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Councils</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                    <div class="card-header text-info text-center">
                        {{$councils->name}}&nbsp;&nbsp;Council information
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            List of schools
                            <table class="table table-bordered table-striped bg-light table-sm">
                                <thead>
                                <th>S/no</th>
                                <th>Schools</th>
                                </thead>
                                <tbody>
                                @foreach($schools as $school)
                                <tr>
                                    <td>
                                        {{++$i}}
                                    </td>
                                    <td>
                                          {{$school->school_name}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                    </div>
                </div>
        </div>
    </section>
@endsection



