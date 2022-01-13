@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Standards Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Standards</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
           <div class="card">
               <div class="card-header text-info text-center">
                   Standard Registration
               </div>
               <div class="card-body">
                   @if (count($errors) > 0)
                       <div class="alert alert-danger alert-dismissible fade show">
                           Woops!! Their is a problem in your inputs<br>
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
                   <form class="form-horizontal" role="form" method="POST" action="{{ route('standards.store') }}">
                       {{ csrf_field() }}
                       Standard name<button id="addRowsstandard" type="button" class="float-right btn btn-outline-info  btn-sm mb-1"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new row</button>
                       <div class="form-group">
                           <div id="inputFormRowsstandard">
                               <div class="input-group mb-1">
                                   <input type="text" name="name[]" class="form-control m-input"  autocomplete="off" required placeholder="Standard I"  autofocus>
                                   <div class="input-group-append">
                                       <button id="removeRowsstandard" type="button" class="btn btn-danger"><i class="" aria-hidden="true"></i>Remove</button>
                                   </div>
                               </div>
                           </div>
                           <div id="newRowsstandard">
                           </div>
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                       </div>
                   </form>
               </div>
           </div>
        </div>
    </section>
@endsection

