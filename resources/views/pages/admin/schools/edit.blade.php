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
                <div class="card-header">
                        Edit School
                </div>
                <div class="card-body">
                    <form  class="form-horizontal" role="form" action="{{ route('schools.update',$school->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="control-label">Council name</label>
        {{--                    <select class="form-control" id="type" name="region_id">--}}
                                <select class="form-control js-region" name="region_id">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ $region->id == $selectedRegionvalue ? 'selected' : '' }}>{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Council name</label>
        {{--                    <select class="form-control" id="type" name="council_id">--}}
                                <select class="form-control js-councils" name="council_id">

                                @foreach($councils as $council)
                                    <option value="{{ $council->id }}" {{ $council->id == $selectedvalue ? 'selected' : '' }}>{{ $council->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">School name</label>
                            <input type="text" name="name" class="form-control m-input" placeholder="Council Name" value="{{ $school->name }}" autocomplete="on">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

