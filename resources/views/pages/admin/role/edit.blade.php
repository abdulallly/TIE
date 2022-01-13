@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                       <div class="card-header">
                               <h6 class="text-info text-center">Updates role details</h6>
                       </div>
                       <div class="card-body">
                               @if (count($errors) > 0)
                                   <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                                       Woops!! Theire is a problem in your inputs
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
                           @if (Session::has('error'))
                               <div class="alert alert-warning" role="alert">
                                   {{Session::get('error')}}
                               </div>
                           @endif
                           {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                           <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                       Role
                                       {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group bg-white">
                                       <div>
                                           Select permission
                                       </div>
                                       <div class="pl-3">
                                           @foreach($permission as $value)
                                               {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                   {{ $value->name }}
                                               <br/>
                                           @endforeach
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-12 text-center">
                                   <button type="submit" class="btn btn-primary float-left btn-sm">Submit</button>
                               </div>
                           </div>
                           {!! Form::close() !!}
                       </div>
                   </div>
        </div>
    </section>
@endsection
