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
                        <li class="breadcrumb-item active">Book information</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
          <div class="card card-outline card-gray">
              <div class="card-header">
                  <h6 class="text-center">Books Information</h6>
              </div>
              <div class="p-3">
                  <a href="{{ route('books.create') }}" class="btn btn-primary float-left btn-xs mb-1" ><i class="fa fa-plus-circle" aria-hidden="true"></i> add new book</a>
                  <br>
                  <div class="text-center text-info">Add Book Data by Excel</div>
                  <form action="{{ route('importbooks') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="file" name="file" class="form-control p-0">
                      <button class="btn btn-warning float-right btn-xs ml-1 mt-2">  <i class="fa fa-download" aria-hidden="true"></i> Dowload Template CSV</button>
                      <button class="btn btn-success float-right btn-xs ml-1 mt-2"><i class="fa fa-upload" aria-hidden="true"></i> Upload Books Data</button>
                      <a href="{{ route('exportbooks') }}" class="btn  btn-primary float-right btn-xs mt-2" ><i class="fa fa-download" aria-hidden="true"></i> Download Books data xls</a>
                  </form>
              </div>
              <div class="card-body">
                  List of Books
                  @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-dismissible fade show">
                          <p>{{ $message }}</p>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @endif
                  <div class="table-responsive">
                      <table class="table table-bordered  table-striped table-sm">
                          <thead>
                          <tr>
                              <th>S/no</th>
                              <th>Book name</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          @if($books->count() > 0)
                              <tbody>
                              @foreach ($books as $book)
                                  <tr role="row" class="odd">
                                      <td>{{ ++$i }}</td>
                                      <td>{{ $book->name }}</td>
                                      <td>
                                          <form  method="POST" action="{{ route('books.destroy',$book->id) }}">
                                              @csrf
                                              <a class="btn btn-info btn-xs" href="{{ route('books.show',$book->id) }}"><i class="fas fa-eye"></i> View</a>
                                              <a class="btn btn-primary btn-xs" href="{{ route('books.edit',$book->id) }}"><i class="fas fa-pencil-alt"></i> update</a>
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Delete</button>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                              @else
                                  <tr >
                                      <td colspan="7" class="text-center">No book information created yet</td>
                                  </tr>
                              @endif
                              </tbody>
                      </table>
                  </div>
              </div>

              {{ $books->links() }}
          </div>
      </div>
    </section>
@endsection
