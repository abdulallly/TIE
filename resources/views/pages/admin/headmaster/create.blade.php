@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header text-center text-info">
                       Headmaster registration form
                   </div>
        <div class="card-body">
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
                                                   Kunashida katika Taarifa zako<br><br>
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
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
                      {{ csrf_field() }}
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="firstname" class="control-label">Firstname</label>
                              <input id="firstname" type="text" class="form-control" name="firstname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Firstname" required autofocus>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="surname" class="control-label">Lastname</label>
                              <input id="lastname" type="text" class="form-control" name="lastname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Lastname" required autofocus>
                          </div>
                       </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="email" class="control-label">email</label>
                              <input id="email" type="email" class="form-control" name="email"  placeholder="email" required autofocus>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="phonenumber" class="control-label">Phone number</label>
                              <input id="phonenumber" type="text" class="form-control" name="phonenumber"  placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <select class="form-control" name="roles">
                                  <option value="">Select role</option>
                                  @foreach ($roles as $role)
                                      <option>{{$role->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group col-md-6">
                              <select class="form-control" name="school_id" id="schoolid" required>
                                  <option value="">Select school</option>
                                  @foreach ($schools as $school)
                                      <option value="{{$school->id}}">{{$school->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                      </div>
                  </form>
        </div>
    </div>
@endsection

