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
                    <div class="card-header">
                            <h6 class="text-info text-center">Standard Registration</h6>
                            <a href="{{ route('standards.create') }}" class="btn btn-outline-info float-left btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> create new standard</a>
                    </div>
                    <div class="card-body">
                        List of standard
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <p>{{ $message }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if($standards->count() > 0)
                            <tbody>
                            @foreach ($standards as $standard)
                                <tr>
                                    <td>{{ ++$i }}.</td>
                                    <td>{{ $standard->name }}</td>
                                    <td>
                                        <form action="{{ route('standards.destroy',$standard->id) }}" method="POST">
                                            <a class="btn  btn-outline-primary btn-xs" title="Edit" href="{{ route('standards.edit',$standard->id) }}"><i class="fas fa-pencil-alt"></i> Update</a>
                                             @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-xs" title="Delete"> <i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr >
                                    <td colspan="7" class="text-center">No standard created yet </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="ml-3">
                        {!! $standards->links() !!}
                    </div>
                </div>
        </div>
    </section>
@endsection

