@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
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
                List of all user's
                <table class="table table-bordered table-striped  table-sm">
                    <thead>
                    <tr>
                        <th>S/no</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Block user</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach ($projectmanager as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        {{ $v }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($user->status==0)
                                    Active
                                @else
                                    Blocked
                                @endif
                            </td>

                            <td>
                                <input data-id="{{$user->id}}" class="js-switch" type="checkbox"
                                    {{ $user->status == 1 ? 'checked' : '' }}>
                            </td>

                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                    @csrf
                                        <a class="btn btn-primary btn-xs" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i> view</a>
                                        @can('user-edit')
                                            <a class="btn btn-info btn-xs" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i> update</a>
                                        @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
             {{ $projectmanager->links() }}
        </div>
    </div>
@endsection
