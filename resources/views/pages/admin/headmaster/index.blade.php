@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header text-info text-center">
            Headmaster's
            @can('user-create')
                <a class="btn  float-left btn-xs"  href="{{ route('users.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new user</a>
            @endcan
        </div>
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-dismissible fade show">
                <p>{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($message = Session::get('failed'))
            <div class="alert alert-warning alert-dismissible fade show">
                <p>{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
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
                        @can('user-ban')
                        <th>Block user</th>
                        @endcan
                        @can('headmaster-view')
                        <th>Action</th>
                        @endcan
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
                            @can('user-ban')
                            <td>
                                <input data-id="{{$user->id}}" class="js-switch" type="checkbox"{{ $user->status == 1 ? 'checked' : '' }}>
                            </td>
                            @endcan
                            @can('headmaster-view')
                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                    @csrf
                                        @can('headmaster-view')
                                         <a class="btn btn-primary btn-xs" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i> view</a>
                                        @endcan
                                        @can('headmaster-edit')
                                            <a class="btn btn-info btn-xs" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i> update</a>
                                        @endcan
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </table>
            </div>
             {{ $headmaster->links() }}
        </div>
    </div>
@endsection
