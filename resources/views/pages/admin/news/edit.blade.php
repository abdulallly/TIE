@extends('layouts.main')
@section('content')

            <div class="card">
                  <div class="card-header text-center text-info">
                         Update region information
                  </div>
                  <div class="card-body">
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
                      <form action="{{ route('regions.update',$region->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="form-group ">
                              <label for="name" class="control-label">Name</label>
                              <input type="text" name="name" value="{{ $region->name }}" class="form-control" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" required placeholder="Region name">
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary btn-sm">Update</button>
                          </div>
                      </form>
                  </div>
              </div>
@endsection

