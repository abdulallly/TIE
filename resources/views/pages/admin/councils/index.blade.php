@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Councils Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Councils</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
                <div class="card">
                    <form action="/mutipleremovecouncil" enctype="multipart/form-data" class="btn-submit">
                        @csrf
                        <div class="card-header">
                                        <a href="{{ route('councils.create') }}" class="btn  btn-outline-info btn-xs float-left" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new council</a>
                                        @if($councils->count() > 0)
                                    @can('council-delete')
                                        <button class="btn btn-light btn-sm btn-xs float-right">
                                            Delete All Selected
                                        </button>
                                    @endcan
                                     @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                List of council's
                                <table class="table table-bordered table-striped bg-light table-sm">
                                    <thead>
                                    <tr>
                                        <th>S/n</th>
                                        <th>Select</th>
                                        <th>Council</th>
                                        <th>Council code</th>
                                        <th>Region</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    @if($councils->count() > 0)
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
                                        <div>
                                            @if ($message = Session::get('warning'))
                                                <div class="alert alert-warning alert-dismissible fade show">
                                                    <p>{{ $message }}</p>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                        @foreach ($councils as $council)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    <label>
                                                        <input type="checkbox" name="council_id[]" value="{{$council->id}}"  >
                                                    </label>
                                                </td>
                                                <td>{{ $council->name}}</td>
                                                <td>{{ $council->code }}</td>
                                                <td>{{ $council->region->name }}</td>
                                                <td>
                                                    <form action="{{ route('councils.destroy',$council->id) }}" method="POST">
                                                        @csrf
                                                        @can('council-view')
                                                            <a class="btn btn-outline-primary btn-xs" href="{{ route('councils.show',$council->id) }}"><i class="fas fa-eye"></i> Show</a>
                                                        @endcan
                                                        @can('council-edit')
                                                            <a class="btn btn-outline-info btn-xs" href="{{ route('councils.edit',$council->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    @endcan
                                                    @method('DELETE')
                                                    @can('council-delete')
                                                            <button type="submit" class="btn btn-outline-danger btn-xs" title="Delete"><i class="fas fa-trash"></i> Delete</button>
                                                    @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <tr >
                                                <td colspan="7" class="text-center">No  councils yet </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                        <div class="pl-3">
                            {!! $councils->links() !!}
                        </div>
                </div>
        </div>
    </section>
@endsection

