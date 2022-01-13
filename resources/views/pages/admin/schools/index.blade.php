@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Schools Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Schools</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="/mutipleremoveschool" enctype="multipart/form-data" class="btn-submit">
                    <div class="card-header">
                           <a href="{{ route('schools.create') }}" class="btn btn-outline-info btn-xs" >
                               <i class="fa fa-plus-circle" aria-hidden="true"></i> Add new school</a>
                            @if($schools->count() > 0)
                                <button class="btn btn-light btn-sm btn-xs float-right">
                                    Delete All Selected
                                </button>
                            @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            List of school's
                            <table class="table table-bordered table-striped bg-light table-sm">
                                <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Select</th>
                                    <th>Schools</th>
                                    <th>Councils</th>
                                    <th>Regions</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @if($schools->count() > 0)
                                    <tbody>
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <p>{{ $message }}</p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        @if ($message = Session::get('warning'))
                                            <div class="alert alert-warning alert-dismissible fade show">
                                                <p>{{ $message }}</p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <label>
                                                    <input type="checkbox" name="school_id[]" value="{{$school->id}}"  >
                                                </label>
                                            </td>
                                            <td>{{ $school->name }}</td>
                                            <td>{{ $school->council->name}}</td>
                                            <td>{{ $school->council->region->name}}</td>
                                            <td>
                                                <form action="{{ route('schools.destroy',$school->id) }}" method="POST">
                                                 @csrf
                                                    <a class="btn btn-outline-primary btn-xs" title="View" href="{{ route('schools.show',$school->id) }}"><i class="fas fa-eye"></i> view</a>
                                                <a class="btn btn-outline-info btn-xs" href="#"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-xs" title="Delete"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr >
                                            <td colspan="7" class="text-center">No school created yet </td>
                                        </tr>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pl-3">
                        {!! $schools->links() !!}
                    </div>
                </form>
                </div>
        </div>
    </section>
@endsection

