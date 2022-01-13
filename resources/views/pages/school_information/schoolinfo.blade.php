@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School information Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">School information</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
           <div class="card">
                <div class="card-header">
                    <a href="{{ route('Schoolinformation.create') }}" class="btn btn-outline-info btn-xs float-left" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new School Inforamtion </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        List of school information
                        <table class="table table-bordered table-striped bg-light table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Standard</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                                <tbody>
                                @if($schoolinfo->count() > 0)
                                @foreach ($schoolinfo as $school_infos)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{$school_infos->standard->name}}</td>
                                        <td>{{$school_infos->male}}</td>
                                        <td>{{$school_infos->female}}</td>
        {{--                                <td>{{$school_infos->school->name}}</td>--}}
        {{--                                <td>{{$school_infos->council->name}}</td>--}}
                                        <td>
                                            <form action="{{ route('Schoolinformation.destroy',$school_infos->id) }}" method="POST">
                                                @csrf
                                                    <a class="btn btn-info btn-xs" href="{{ route('Schoolinformation.edit',$school_infos->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                  @else
                                        <tr >
                                            <td colspan="7" class="text-center">No information availlable</td>
                                        </tr>
                                @endif
                                </tbody>
                        </table>
                    </div>
                </div>
            <div class="pl-3">
                {!! $schoolinfo->links() !!}
            </div>
        </div>
        </div>
    </section>
@endsection
