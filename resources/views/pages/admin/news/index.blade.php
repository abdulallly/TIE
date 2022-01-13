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
                    <div class="card-header ">
                        <h6 class="text-center text-info"></h6>
                            <a href="{{ route('newsuploads.create') }}" class="btn btn-outline-info btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add News</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            List of News
                            <table class="table table-bordered table-striped bg-light table-sm">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>File</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @if($machapishos->count() > 0)
                                    <tbody>
                                    <div>
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <p>{{ $message }}</p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    @foreach ($machapishos as $key => $region)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td class="text-uppercase">{{ $region->title }}</td>
                                            <td class="text-uppercase">{{ $region->file }}</td>
                                            <td class="text-uppercase">{{ $region->description }}</td>
                                            <td class="text-uppercase">{{ $region->date }}</td>
                                            <td>
                                                <form action="{{ route('newsuploads.destroy',$region->id) }}" method="POST">
                                                    @csrf
{{--                                                        <a class="btn btn-info btn-xs" href="{{ route('newsuploads.edit',$region->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>--}}
                                            <a class="btn btn-info btn-xs" href="{{ route('viewpdfmachapisho',$region->id) }}"><i class="fas fa-eye"></i> view</a>
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr >
                                            <td colspan="7" class="text-center">No News created yet</td>
                                        </tr>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>

                </div>
        </div>
    </section>
@endsection

