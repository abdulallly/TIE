@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header text-info text-center">
            Headmaster's
            @can('user-create')
                <a class="btn  float-left btn-xs"  href="{{ route('users.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new user</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                List of all headmaster's
                <table class="table table-bordered table-striped  table-sm">
                    <thead>
                    <tr>
                        <th>S/no</th>
                        <th>Email</th>
                        <th>Region</th>
                        <th>Council</th>
                        <th>School</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    @foreach ($headmaster as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->region_id==null)
                                <td class="text-info"></td>
                            @else
                                <td class="text-uppercase">{{ $user->region->name }}</td>
                            @endif
                            @if($user->council_id==null)
                                <td class="text-info"></td>
                            @else
                                <td>{{ $user->council->name }}</td>
                            @endif
                            @if($user->school_id==null)
                                <td class="text-info"></td>
                            @else
                                <td>{{ $user->school->name }}</td>
                            @endif
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        {{ $v }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($user->status==0)
                                    <span class="text-success">
                                        Active
                                    </span>
                                @else
                                    <span class="text-danger">
                                        Blocked
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
{{--            {{ $headmaster->links() }}--}}
        </div>
    </div>
@endsection
