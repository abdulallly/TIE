@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">News</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-center text-info">
                    News registration
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade show">
                            Their is a problem on your inputs<br><br>
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
                    <form class="form-horizontal" role="form"  enctype="multipart/form-data" method="POST" action="{{ route('newsuploads.store') }}">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control m-input" placeholder="Title" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" autocomplete="on">
                            </div>
                            <div class="form-group col-md-6">
                                <input name="file" type="file" >
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" rows="3" name="description" value="" required placeholder="Please write here your description including fontsize, font family"></textarea>
                        </div>



                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


