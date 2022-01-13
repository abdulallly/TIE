@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Schools Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Schools</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-info text-center">
                        {{$schools->name}}  Details
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped bg-light table-sm">
                            <thead>
                            <tr>
                                <th>S/no</th>
                                <th>Standard</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($schools_info->count() > 0)
                                @foreach($schools_info as $schools_infos)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{ $schools_infos->standard->name}}</td>
                                    <td>{{ $schools_infos->male }}</td>
                                    <td>{{ $schools_infos->female }}</td>
                                </tr>

                            @endforeach
                            @else

                                <tr >
                                    <td colspan="7" class="text-center">No  School details created yet </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection





