@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header text-center text-info">
                    Users list
                </div>
                <div class="p-3">
                    @can('user-create')
                    <a class="btn btn-outline-info float-left btn-xs mb-1"  href="{{ route('users.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new user</a>
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
                                <th>Region</th>
                                <th>Council</th>
                                <th>School</th>
                                <th>Role</th>
                                <th>Description</th>
                                <th>Block user</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($alluser as $key => $user)
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

                                    <td>
                                        <input data-id="{{$user->id}}" class="js-switch" type="checkbox"{{ $user->status == 1 ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                            @csrf
                                            <a class="btn btn-outline-primary btn-xs" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i> view</a>
                                            @can('user-edit')
                                                <a class="btn btn-outline-info btn-xs" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i> update</a>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $alluser->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
