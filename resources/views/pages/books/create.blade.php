@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Books</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Books Registration</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card  card-outline card-gray">
                <div class="card-header  text-center">
                    Add new Book informations
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('books.store') }}">
                        @csrf
                        Book name<button id="addRowsbook" type="button" class="float-right btn  btn-sm mb-1"><i class="fa fa-plus-circle" aria-hidden="true"></i>add new row</button>
                        <div class="form-group">
                            <div id="inputFormRowsbook">
                                <div class="input-group mb-1">
                                    <input type="text" name="name[]" class="form-control m-input" required pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Kiswahili"  autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="removeRowsbook" type="button" class="btn btn-danger"><i class="" aria-hidden="true"></i>Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div id="newRowsbook">
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

