@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="container-fluid">
        <div class="card">
            <div class="card-header text-info text-center">
                    Update user information
            </div>

            <div class="card-body">
                        {{--  /*Headmaster */--}}
                  @if($users->region_id != null && $users->council_id != null && $users->school_id != null )
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update',$users->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname" class="control-label">Firstname</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{$users->firstname}}" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Firstname" required autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="surname" class="control-label">Lastname</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{$users->lastname}}"pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Lastname" required autofocus>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email" class="control-label">email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{$users->email}}" placeholder="email" required autofocus>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phonenumber" class="control-label">Phone Number</label>
                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="0{{$users->phonenumber}}" placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="role" class="control-label">Select role</label>
                                    <select class="form-control" name="roles" required>
                                        <option value="">Select role</option>
                                        @foreach ($roles as $role)
                                            <option  {{ $role->name == $selectedvalue ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="role" class="control-label">Select Region</label>
                                    <select class="form-control" name="region_id" required>
                                        <option value="">Select region</option>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}" {{ $region->id == $selectedvalueregion_id ? 'selected' : '' }}>{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="role" class="control-label">Select Council</label>
                                    <select class="form-control" name="council_id" required>
                                        @foreach($councils as $council)
                                            <option value="{{ $council->id }}" {{ $council->id == $selectedvaluecouncil_id ? 'selected' : '' }}>{{ $council->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="role" class="control-label">Select School</label>
                                        <select class="form-control " name="school_id" required id="school_id" >
                                            @foreach ($schools as $school)
                                                <option value="{{ $school->id }}" {{ $school->id == $selectedvalueschool_id ? 'selected' : '' }}>{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                        {{--  Statistical officer--}}
                    @elseif($users->region_id != null && $users->council_id != null && $users->school_id == null )
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update',$users->id) }}">
                           @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname" class="control-label">Firstname</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{$users->firstname}}" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Firstname" required autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="surname" class="control-label">Lastname</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{$users->lastname}}"pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Lastname" required autofocus>
                                </div>
                            </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="email" class="control-label">email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{$users->email}}" placeholder="email" required autofocus>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phonenumber" class="control-label">Phone Number</label>
                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="0{{$users->phonenumber}}" placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="role" class="control-label">Select role</label>
                                <select class="form-control" name="roles" required>
                                    <option value="">Select role</option>
                                    @foreach ($roles as $role)
                                        <option  {{ $role->name == $selectedvalue ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="role" class="control-label">Select Region</label>
                                <select class="form-control" name="region_id" required>
                                    <option value="">Select region</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}" {{ $region->id == $selectedvalueregion_id ? 'selected' : '' }}>{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="role" class="control-label">Select Council</label>
                                <select class="form-control" name="council_id" required>
                                    @foreach($councils as $council)
                                        <option value="{{ $council->id }}" {{ $council->id == $selectedvaluecouncil_id ? 'selected' : '' }}>{{ $council->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                   @else
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update',$users->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname" class="control-label">Firstname</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{$users->firstname}}" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Firstname" required autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="surname" class="control-label">Lastname</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{$users->lastname}}"pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Lastname" required autofocus>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email" class="control-label">email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{$users->email}}" placeholder="email" required autofocus>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phonenumber" class="control-label">Phone Number</label>
                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="0{{$users->phonenumber}}" placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="role" class="control-label">Select role</label>
                                        <select class="form-control" name="roles" required>
                                            <option value="">Select role</option>
                                            @foreach ($roles as $role)
                                                <option  {{ $role->name == $selectedvalue ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                   @endif
            </div>
        </div>
        </div>
    </section>
@endsection
