@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Book Categories</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Update Book Categories information</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-lightblue">
                <div class="card-header text-center">
                    Update book categories information
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
                    <form action="{{ route('book_categories.update',$book_category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="col-md- control-label">Book name</label>
                                <select class="form-control " name="book_id" required>
                                    <option value="">Book</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}" {{ $book->id == $book_selectedvalue ? 'selected' : '' }}>{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md- control-label">Book Standard</label>
                                <select class="form-control " name="standard_id" required>
                                    @foreach($standards as $standard)
                                        <option value="{{ $standard->id }}" {{ $standard->id == $standard_selectedvalue ? 'selected' : '' }}>{{ $standard->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="control-label">Book category name</label>
                                <input  type="text" class="form-control" name="name[]"pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Category name" value="{{ $book_category->name }}" required autofocus>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="control-label">quantity</label>
                                <input  type="number" class="form-control" name="quantity[]"  placeholder="Quantity" value="{{ $book_category->quantity }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
