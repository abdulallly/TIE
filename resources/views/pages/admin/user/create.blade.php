@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>User Registration</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add new user</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h6 class="card-title p-3">User Registration</h6>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item "><a class="nav-link active" href="#tab_1" data-toggle="tab">Admin/Project manager</a></li>
                                <li class="nav-item "><a class="nav-link" href="#tab_2" data-toggle="tab">Statistical officer</a></li>
                                <li class="nav-item "><a class="nav-link" href="#tab_3" data-toggle="tab">Headmaster</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    {{--                               /*Project manager registration form*/--}}
                                    <div class="card-body">
                                        @if ($message = Session::get('warn'))
                                            <div class="alert alert-warning alert-dismissible fade show">
                                                <p>{{ $message }}</p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
                                            {{ csrf_field() }}
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="firstname" class="control-label">Firstname</label>
                                                    <input id="firstname" type="text" class="form-control" name="firstname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Firstname" required autofocus>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="surname" class="control-label">Lastname</label>
                                                    <input id="lastname" type="text" class="form-control" name="lastname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Lastname" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="email" class="control-label">email</label>
                                                    <input id="email" type="email" class="form-control" name="email"  placeholder="email" required autofocus>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="phonenumber" class="control-label">Phone Number</label>
                                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber"  placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="role" class="control-label">Select role</label>
                                                    <select class="form-control" name="roles" required>
                                                        <option value="">Select role</option>
                                                        @foreach ($roles as $role)
                                                            <option>{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                {{--                           /*Statistical officer registration form*/--}}
                                <div class="tab-pane" id="tab_2">
                                    <div class="card-body">
                                        @if ($message = Session::get('warn'))
                                            <div class="alert alert-warning alert-dismissible fade show">
                                                <p>{{ $message }}</p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
                                            {{ csrf_field() }}
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="firstname" class="control-label">Firstname</label>
                                                    <input id="firstname" type="text" class="form-control" name="firstname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Firstname" required autofocus>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="surname" class="control-label">Lastname</label>
                                                    <input id="lastname" type="text" class="form-control" name="lastname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Lastname" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="email" class="control-label">email</label>
                                                    <input id="email" type="email" class="form-control" name="email"  placeholder="email" required autofocus>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="phonenumber" class="control-label">Phone Number</label>
                                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber"  placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="role" class="control-label">Select role</label>
                                                    <select class="form-control" name="roles" required>
                                                        <option value="">Select role</option>
                                                        @foreach ($roles as $role)
                                                            <option>{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="role" class="control-label">Select Region</label>
                                                    <select class="form-control" name="region_id" required>
                                                        <option value="">Select region</option>
                                                        @foreach ($regions as $region)
                                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="role" class="control-label">Select Council</label>
                                                    <select class="form-control" name="council_id" required>
                                                        <option value="">Select council</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{--                           /*Headmaster registration form*/--}}
                                <div class="tab-pane" id="tab_3">
                                    <div class="card-body">
                                        @if ($message = Session::get('warn'))
                                            <div class="alert alert-warning alert-dismissible fade show">
                                                <p>{{ $message }}</p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
                                            {{ csrf_field() }}
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="firstname" class="control-label">Firstname</label>
                                                    <input id="firstname" type="text" class="form-control" name="firstname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Firstname" required autofocus>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="surname" class="control-label">Lastname</label>
                                                    <input id="lastname" type="text" class="form-control" name="lastname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Lastname" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="email" class="control-label">email</label>
                                                    <input id="email" type="email" class="form-control" name="email"  placeholder="email" required autofocus>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="phonenumber" class="control-label">Phone Number</label>
                                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber"  placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="role" class="control-label">Select role</label>
                                                    <select class="form-control" name="roles" required>
                                                        <option value="">Select role</option>
                                                        @foreach ($roles as $role)
                                                            <option>{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="role" class="control-label">Select Region</label>
                                                    <select class="form-control" name="region_id" required>
                                                        <option value="">Select region</option>
                                                        @foreach ($regions as $region)
                                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="role" class="control-label">Select Council</label>
                                                    <select class="form-control" name="council_id" required>
                                                        <option value="">Select council</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="role" class="control-label">Select School</label>
                                                    <select class="form-control" name="school_id" required>
                                                        <option value="">Select School</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
@endsection

