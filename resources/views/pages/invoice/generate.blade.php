@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header text-info text-center">
            Generate invoice
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Whoops!</strong> There were some problems with your input.<br>
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
                @if ($message = Session::get('failed'))
                    <div class="alert alert-warning alert-dismissible fade show">
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <form action="{{ route('generateinv.store') }}" method="POST" class="btn-submit">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="col-md- control-label">Select region</label>
                        <select class="form-control " name="region_id" required>
                            <option value="">Please select Region</option>
                            @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md- control-label">Select council</label>
                        <select class="form-control " name="council_id" required>
                            <option value="">Please select Council</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">generate</button>
                </div>
            </form>
        </div>
    </div>
@endsection

