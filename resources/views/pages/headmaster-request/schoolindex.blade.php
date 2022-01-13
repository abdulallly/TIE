@extends('layouts.main')
@section('content')
   <div class="card">
        <div class="card-header">
            <a href="#" class="btn btn-xs float-left" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Please select School to look School request </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                List of School
                <table class="table table-bordered table-striped bg-light table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>School</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach ($school_info as $school_infos)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{$school_infos->name}}</td>
                                <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('bookrequestindex',$school_infos->id) }}"><i class="fas fa-eye"></i> Show</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    <div class="pl-3">
        {!! $school_info->links() !!}
    </div>
</div>
@endsection
