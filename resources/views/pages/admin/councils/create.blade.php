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
                    <div class="card-header text-center text-info">
                            Councils Registration
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('councils.store') }}">
                            @csrf
                                <div class="form-group">
                                    <label class="col-md- control-label">Select Region</label>
                                    <select class="form-control " name="region_id" required>
                                        <option value="">Please select Region</option>
                                        @foreach ($regions as $region)
                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group">
                                <label>Council details</label>
                                <button id="councilrow" type="button" class="float-right btn  btn-sm mb-1"><i class="fa fa-plus-circle" aria-hidden="true"></i> add row</button>
                                <div id="inputCouncilform">
                                    <div class="input-group mb-1">
                                        <input type="text" name="name[]" required class="form-control m-input" placeholder="Council name" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" autocomplete="on">
                                        <input type="number" name="code[]" required class="form-control m-input" placeholder="Council code"  autocomplete="on">
                                        <div class="input-group-append">
                                            <button id="removecouncilrow" type="button" class="btn btn-danger"><i class="" aria-hidden="true"></i>remove</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="newCouncilrow">
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

