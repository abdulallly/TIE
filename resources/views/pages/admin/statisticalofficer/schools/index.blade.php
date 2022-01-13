@extends('layouts.main')
@section('content')
    <div class="card">
            <div class="card-header text-info text-center">
                 Schools
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    List of schools
                    <table class="table table-bordered table-striped bg-light table-sm">
                        <thead>
                        <tr>
                            <th>S/n</th>
                            <th>Schools</th>
                            <th>Councils</th>
                            <th>Regions</th>
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
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->council->name}}</td>
                                    <td>{{ $school->council->region->name}}</td>
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
    </div>
@endsection

