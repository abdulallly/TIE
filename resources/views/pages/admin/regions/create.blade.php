@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Regions Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Regions</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
                 <div class="card">
                      <div class="card-header text-center text-info">
                              Region Registration
                      </div>
                      <div class="card-body">
                          <form action="{{ route('regions.store') }}" method="POST" class="btn-submit">
                              @csrf
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
                              <button id="Region" type="button" class="float-right btn  btn-sm mb-1"><i class="fa fa-plus-circle" aria-hidden="true"></i> add row</button>
                              <div class="form-group">
                                  <div id="inputRegion">
                                      <div class="input-group mb-1">
                                          <input type="text" name="name[]" class="form-control m-input" placeholder="Region name" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" autocomplete="on">
                                          <div class="input-group-append">
                                              <button id="removeRegion" type="button" class="btn btn-danger"><i class="" aria-hidden="true"></i>remove</button>
                                          </div>
                                      </div>
                                  </div>
                                  <div id="newRegion">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-primary btn-sm">Submit</button>
                              </div>
                          </form>
                      </div>
                  </div>
        </div>
    </section>
@endsection

