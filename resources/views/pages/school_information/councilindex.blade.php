@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School information Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">School information</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
           <div class="card">
                <div class="card-header">
                    <a href="{{ route('Schoolinformation.create') }}" class="btn btn-xs float-left" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new School Inforamtion </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        List of Councils
                        <table class="table table-bordered table-striped bg-light table-sm">
                            <thead>
                            <tr>
                                <td>#</td>

                                <th>Council</th>
                            </tr>
                            </thead>
                                <tbody>
                                @foreach ($school_info as $school_infos)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                          <a class="" href="{{ route('schoolindex',$school_infos->id) }}">{{$school_infos->name}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            <div class="pl-3">
                {!! $school_info->links() !!}
            </div>
        </div>
        </div>
    </section>
@endsection
