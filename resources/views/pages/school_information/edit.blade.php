@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header text-center text-info">
            School information Registration
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
            <form class="form-horizontal" role="form" method="POST" action="{{ route('Schoolinformation.update',$schoolinformation->id) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Select Region</label>
                        <select class="form-control" name="regions_id" required id="regions_id" disabled>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}" {{ $region->id == $selectedvalueregion_id ? 'selected' : '' }}>{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Select Council</label>
                        <select class="form-control " name="councils_id" required id="councils_id" disabled>
                            @foreach($councils as $council)
                                <option value="{{ $council->id }}" {{ $council->id == $selectedvaluecouncil_id ? 'selected' : '' }}>{{ $council->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Select School</label>
                        <select class="form-control " name="schools_id" required id="schools_id" disabled>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}" {{ $school->id == $selectedvalueschool_id ? 'selected' : '' }}>{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Please Select Standard</label>
                        <select class="form-control" name="standard_id" required id="standard_id">
                            <option value="">Please select Standard</option>
                            @foreach ($standards as $standard)
                                <option value="{{ $standard->id }}" {{ $standard->id == $selectedvaluestandard_id ? 'selected' : '' }}>{{ $standard->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Male</label>
                        <input type="number" name="male" required class="form-control m-input" placeholder="Male no" value="{{$schoolinformation->male}}"  min="0" autocomplete="on">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Female</label>
                        <input type="number" name="female" required class="form-control m-input" placeholder="Female no" value="{{$schoolinformation->female}}" min="0" autocomplete="on">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

