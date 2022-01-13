@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School information  Management</h1>
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
                    <a href="{{ route('Schoolinformation.create') }}" class="btn btn-outline-info btn-xs float-left" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new School Inforamtion </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        List of School
                        <table class="table table-bordered table-striped bg-light table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>School</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                                <tbody>
                                @foreach ($school_info as $school_infos)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{$school_infos->name}}</td>
                                        <td>
                                                    <a class="btn btn-primary btn-xs" href="{{ route('Schoolinformation.show',$school_infos->id) }}"><i class="fas fa-eye"></i> Show</a>
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
