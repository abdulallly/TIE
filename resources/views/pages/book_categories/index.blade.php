@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Books Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Book Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-lightblue">
                <div class="card-header text-info text-center">
                    Book Categories
                </div>
                <div class="p-3">
                    @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($message = Session::get('pass'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <a href="{{ route('book_categories.create') }}" class="btn btn-primary float-left btn-xs mb-1" ><i class="fa fa-plus-circle" aria-hidden="true"></i> add new book category</a>
                    <br>
                    <div class="text-center text-info">Add Book Category  by Excel</div>
                    <form action="{{ route('book_category_imports') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="file" required>
                            <label class="custom-file-label" for="customFile">Choose file to import book category data</label>
                        </div>
                        <a href="{{ route('category_exports') }}" class="btn btn-warning float-right btn-xs ml-1 mt-2"><i class="fa fa-download" aria-hidden="true"></i> Dowload Template CSV</a>
                        <button class="btn btn-success float-right btn-xs ml-1 mt-2"><i class="fa fa-upload" aria-hidden="true"></i> Upload Book categories Data</button>
                        <a href="{{ route('category_exports') }}" class="btn  btn-primary float-right btn-xs mt-2" ><i class="fa fa-download" aria-hidden="true"></i> Download Book categories data xls</a>
                    </form>
                </div>
                <div class="card-body card-outline card-gray">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        List of Book Categories
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Book name</th>
                                <th>Book Categories</th>
                                <th>Book Standard</th>
                                <th>Book Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if($books->count() > 0)
                                <tbody>
                                @foreach ($books as $book)
                                    <tr role="row" class="odd">
                                        <td>{{ ++$i }}</td>
                                        <td>{{$book->book->name}}</td>
                                        <td>{{$book->name}}</td>
                                        <td>{{$book->standard->name}}</td>
                                        <td>{{$book->quantity}}</td>
                                        <td>
                                            <form  method="POST" action="{{ route('book_categories.destroy',$book->id) }}">
                                                @csrf
                                                 <a class="btn btn-primary btn-xs" href="{{ route('book_categories.edit',$book->id) }}"><i class="fas fa-pencil-alt"></i> Update</a>
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-danger btn-xs"><i  class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr >
                                        <td colspan="7" class="text-center">No book category information</td>
                                    </tr>
                                @endif
                                </tbody>
                        </table>
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
