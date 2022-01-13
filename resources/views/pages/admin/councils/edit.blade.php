@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Councils Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Councils</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-info text-center">
                        Update {{$council->name}} &nbsp; information
                </div>
                <div class="card-body">
                    <form  class="form-horizontal" role="form" action="{{ route('councils.update',$council->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md- control-label">Select Region</label>
                            <select class="form-control" id="type" name="region_id">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ $region->id == $selectedvalue ? 'selected' : '' }}>{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div id="inputCouncilform">
                                <div class="input-group mb-1">
                                    <input type="text" name="name" class="form-control m-input" placeholder="Council Name" value="{{ $council->name }}" autocomplete="on" pattern="[a-zA-Z'-'\s]*" title="only string is allowed">
                                    <input type="number" name="code" class="form-control m-input" placeholder="Council Code" value="{{ $council->code }}"  autocomplete="on">
                                </div>
                            </div>
                            <div id="newCouncilrow">
                            </div>
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

