@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Role create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card card-lightblue card-outline">
                <div class="card-header text-center">
                    Create Role
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('roles.store') }}" method="POST" class="btn-submit">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    Role Name
                                    <input id="text" type="text" class="form-control" name="name"  placeholder="Name" value="" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group bg-white">
                                    Select permissions
                                    <br/>
                                    <div class="pl-4 bg-light">
                                        @foreach($permission as $value)
                                            <input type="checkbox" class="form-check-input"  name="permission[]" value="{{$value->id}}">
                                            {{$value->name}}
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary float-right btn-xs">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
