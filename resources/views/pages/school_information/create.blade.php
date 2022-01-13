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
                <div class="card-header text-center text-info">
                    School Inforamtion
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        @if ($message = Session::get('failed'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                <p>{{ $message }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade show">
                                Woops Their is problem on your inputs<br>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('Schoolinformation.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-md- control-label">Select Region</label>
                                <select class="form-control" name="regions_id" required id="regions_id">
                                    <option value="">Please select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-md- control-label">Select Council</label>
                                <select class="form-control " name="councils_id" required id="councils_id">
                                    <option value="">Please select Councils</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-md- control-label">Select School</label>
                                <select class="form-control " name="schools_id" required id="schools_id">
                                    <option value="">Please select School</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-md- control-label">Please Select Standard</label>
                                <select class="form-control" name="standard_id" required id="standard_id">
                                    <option value="">Please select Standard</option>
                                    @foreach ($standards as $standard)
                                        <option value="{{$standard->id}}">{{$standard->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-md- control-label">Male</label>
                                <input type="number" name="male" required class="form-control m-input" placeholder="Male no"  min="0" autocomplete="on">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-md- control-label">Female</label>
                                <input type="number" name="female" required class="form-control m-input" placeholder="Female no" min="0" autocomplete="on">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

