@extends('layouts.main')
@section('content')
       <div class="row">
           <div class="col-12">
               <!-- Custom Tabs -->
               <div class="card">
                   <div class="card-header d-flex p-0">
                       <h3 class="card-title p-3">Usajili wa watumiaji</h3>
                       @if(  auth()->user()->hasRole('Admin'))
                       <ul class="nav nav-pills ml-auto p-2">
                           <li class="nav-item "><a class="nav-link active" href="#tab_1" data-toggle="tab">Watumiaji wa Wizara</a></li>
                           <li class="nav-item "><a class="nav-link" href="#tab_2" data-toggle="tab">Watumiaji wa Taasisi</a></li>
                       </ul>
                      @endif
                   </div><!-- /.card-header -->
                   <div class="card-body">
                       <div class="tab-content">
                           <div class="tab-pane active" id="tab_1">
                               {{--PART YA SUPER ADMIN--}}
                               @if(  auth()->user()->hasRole('Super-Admin'))
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
                                                   <label for="firstname" class="control-label">jina la Kwanza</label>
                                                   <input id="firstname" type="text" class="form-control" name="firstname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="jina la Kwanza" required autofocus>
                                               </div>
                                               <div class="form-group col-md-6">
                                                   <label for="surname" class="control-label">Jina la Mwisho</label>
                                                   <input id="lastname" type="text" class="form-control" name="lastname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Jina la Mwisho" required autofocus>
                                               </div>

                                           </div>
                                           <div class="form-row">
                                               <div class="form-group col-md-6">
                                                   <label for="email" class="control-label">Barua pepe</label>
                                                   <input id="email" type="email" class="form-control" name="email"  placeholder="Barua pepe" required autofocus>
                                               </div>
                                               <div class="form-group col-md-6">
                                                   <label for="phonenumber" class="control-label">Namba ya Simu</label>
                                                   <input id="phonenumber" type="text" class="form-control" name="phonenumber"  placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                                               </div>
                                           </div>
                                           <div class="form-row">
                                               <div class="form-group col-md-6">
                                                   <select class="form-control" name="roles">
                                                       <option value="">Chagua cheo</option>
                                                       @foreach ($roles as $role)
                                                           <option>{{$role->name}}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                               <div class="form-group col-md-6">
                                                   <select class="form-control" name="wizara_id" id="wizaraid" required>
                                                       <option value="">Chagua wizara</option>
                                                       @foreach ($wizaras as $wizara)
                                                           <option value="{{$wizara->id}}">{{$wizara->name}}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                           </div>

                                           <div class="form-group">
                                               <button type="submit" class="btn btn-primary btn-sm">Tengeneza</button>
                                           </div>
                                       </form>
                                   </div>
                               @else
                                    {{-- NORMAL USER WA TAASISI--}}
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
                                               <div class="form-group col-md-4">
                                                   <label for="firstname" class="control-label">jina la Kwanza</label>
                                                   <input id="firstname" type="text" class="form-control" name="firstname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed"  placeholder="jina la Kwanza" required autofocus>
                                               </div>
                                               <div class="form-group col-md-4">
                                                   <label for="surname" class="control-label">Jina la Mwisho</label>
                                                   <input id="lastname" type="text" class="form-control" name="lastname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Jina la Mwisho" required autofocus>
                                               </div>
                                               <div class="form-group  col-md-4">
                                                   <label for="email" class="control-label">Barua pepe</label>
                                                   <input id="email" type="email" class="form-control" name="email"  placeholder="Barua pepe" required autofocus>
                                               </div>
                                           </div>
                                           <div class="form-group ">
                                               <label for="phonenumber" class="control-label">Namba ya Simu</label>
                                               <input id="phonenumber" type="text" class="form-control" name="phonenumber"  placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                                           </div>
                                               <div class="form-group ">
                                                   <select class="form-control" name="roles">
                                                       <option value="">Chagua cheo</option>
                                                       @foreach ($roles as $role)
                                                           <option>{{$role->name}}</option>
                                                       @endforeach
                                                   </select>
                                           </div>
                                         @can('ministries-management')
                                            <div class="form-group">
                                                       <select class="form-control" name="wizara_id" id="wizaraid" required>
                                                           <option value="">Chagua wizara</option>
                                                           @foreach ($wizaras as $wizara)
                                                               <option value="{{$wizara->id}}">{{$wizara->name}}</option>
                                                           @endforeach
                                                       </select>
                                                   </div>
                                         @endcan
                                           <div class="form-group">
                                               <button type="submit" class="btn btn-primary btn-sm">Hifadhi</button>
                                           </div>
                                       </form>
                                </div>
                               @endif

                           </div>
                           <!-- /.tab-pane -->
                           <div class="tab-pane" id="tab_2">
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
                                           <div class="form-group col-md-4">
                                               <label for="firstname" class="control-label">jina la Kwanza</label>
                                               <input id="firstname" type="text" class="form-control" name="firstname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="jina la Kwanza" required autofocus>
                                           </div>
                                           <div class="form-group col-md-4">
                                               <label for="surname" class="control-label">Jina la Mwisho</label>
                                               <input id="lastname" type="text" class="form-control" name="lastname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Jina la Mwisho" required autofocus>
                                           </div>
                                           <div class="form-group  col-md-4">
                                               <label for="email" class="control-label">Barua pepe</label>
                                               <input id="email" type="email" class="form-control" name="email"  placeholder="Barua pepe" required autofocus>
                                           </div>
                                       </div>
                                       <div class="form-row">
                                           <div class="form-group col-md-6">
                                               <select class="form-control" name="roles" required>
                                                   <option value="">Chagua Cheo</option>
                                                   @foreach ($roles as $role)
                                                       <option>{{$role->name}}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                           <div class="form-group col-md-6">
                                               <select class="form-control" name="institution_id" id="institution_id" required>
                                                   <option value="">Chagua Taasis</option>
                                                   @foreach ($institutions as $institution)
                                                       <option value="{{$institution->id}}">{{$institution->name}}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                       </div>
                                       <div class="form-group">
                                           <label for="phonenumber" class="control-label">Namba ya Simu</label>
                                           <input id="phonenumber" type="text" class="form-control" name="phonenumber"  placeholder="0712345678" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                                       </div>
                                       <div class="form-group">
                                           <button type="submit" class="btn btn-primary btn-sm">Hifadhi</button>
                                       </div>
                                   </form>
                               </div>
                           </div>

                           <!-- /.tab-pane -->
                       </div>
                       <!-- /.tab-content -->
                   </div><!-- /.card-body -->
               </div>
               <!-- ./card -->
           </div>
           <!-- /.col -->
       </div>
@endsection

