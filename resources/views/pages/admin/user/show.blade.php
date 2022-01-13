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
    <section class="content">
        <div class="container-fluid">
        <div class="card card-info card-outline m-0">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="../../dist/img/undraw_profile.svg"
                         alt="User profile picture">
                </div>
                <h3 class="profile-username text-center text-bold">{{ $user->firstname }} {{ $user->lastname }} </h3>
                <p class="text-muted text-center text-bold text-cyan">
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            {{ $v }}
                        @endforeach
                    @endif
                </p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Name</b> <a class="float-right">{{ $user->firstname }}   {{$user->lastname}}</a>
                    </li>
                    @if(!empty($user->region->name))
                        <li class="list-group-item">
                            <b>Region</b> <a class="float-right">{{$user->region->name }}</a>
                        </li>
                    @else

                    @endif
                    @if(!empty($user->council->name ))
                        <li class="list-group-item">
                            <b>Council</b> <a class="float-right">{{$user->council->name }}</a>
                        </li>
                    @else
                    @endif
                    @if(!empty($user->school->name ))
                        <li class="list-group-item">
                            <b>School</b> <a class="float-right">{{$user->school->name }}</a>
                        </li>
                    @else
                    @endif
                    <li class="list-group-item">
                        <b>Phone number</b> <a class="float-right">0{{ $user->phonenumber }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        </div>
    </section>
@endsection






