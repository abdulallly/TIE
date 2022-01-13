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
                <div class="card-header text-center text-info">
                    School Registration
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('schools.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="col-md- control-label">Select Region</label>
                                <select class="form-control" name="region_id" required id="region_id">
                                    <option value="">Please select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md- control-label">Select Council</label>
                                <select class="form-control " name="council_id" required id="council_id">
                                    <option value="">Please select Councils</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>School details</label>
                            <button id="schoolrow" type="button" class="float-right btn btn-outline-info  btn-sm mb-1"><i class="fa fa-plus-circle" aria-hidden="true"></i> add row</button>
                            <div id="inputschoolform">
                                <div class="input-group mb-1">
                                    <input type="text" name="name[]" required class="form-control m-input" placeholder="School name" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" autocomplete="on">
                                    <div class="input-group-append">
                                        <button id="removeschoolrow" type="button" class="btn btn-danger"><i class="" aria-hidden="true"></i>remove</button>
                                    </div>
                                </div>
                            </div>
                            <div id="newschoolrow">
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

