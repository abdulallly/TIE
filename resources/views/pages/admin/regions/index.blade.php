@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Regions Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Regions</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info card-outline">
                    <div class="card-header ">
                            <h6 class="text-center text-info">Regions</h6>
                            @can('region-create')
                            <a href="{{ route('regions.create') }}" class="btn  btn-outline-info btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new Region</a>
                            @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            List of regions
                            <table class="table table-bordered table-striped bg-light table-sm">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @if($regions->count() > 0)
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
                                    @foreach ($regions as $key => $region)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td class="text-uppercase">{{ $region->name }}</td>
                                            <td>
                                                <form action="{{ route('regions.destroy',$region->id) }}" method="POST">
                                                    @csrf
                                                    @can('region-view')
                                                        <a class="btn btn-primary btn-xs" href="{{ route('regions.show',$region->id) }}"><i class="fas fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('region-edit')
                                                        <a class="btn btn-info btn-xs" href="{{ route('regions.edit',$region->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    @endcan
                                                    @method('DELETE')
                                                    @can('region-delete')
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash"></i> Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr >
                                            <td colspan="7" class="text-center">No Region created yet</td>
                                        </tr>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pl-3">
                        {!! $regions->links() !!}
                    </div>
                </div>
        </div>
    </section>
@endsection

