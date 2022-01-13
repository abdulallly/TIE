@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                    <div class="card-header">
                            <a class="btn btn-outline-info btn-xs" href="{{ route('roles.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new role</a>
                    </div>
                    <div class="card-body">
                            List of roles
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <p>{{ $message }}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ ++$i }}.</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                                    <a class="btn btn-outline-primary btn-xs" title="View" href="{{ route('roles.show',$role->id) }}"><i class="fas fa-eye"></i> view</a>
                                                    @can('role-edit')
                                                        <a class="btn btn-outline-info btn-xs" title="Edit" href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-pencil-alt"></i> update</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-xs" title="Delete"> <i class="fas fa-trash"></i> delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                    </div>
                    <div class="pl-3">
                        {!! $roles->render() !!}
                    </div>
                </div>
        </div>
    </section>
@endsection
