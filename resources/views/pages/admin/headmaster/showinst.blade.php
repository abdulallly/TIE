@extends('layouts.main')
@section('content')
{{--    <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                    Taarifa za Mtumiaji--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}

{{--                <h6 class="card-text text-sm"><label>Namba ya Simu:</label><span> </span></h6>--}}

{{--            </div>--}}
        <div class="card card-primary  card-outline m-0">
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
                    @endif</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Barua pepe</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Wizara</b> <a class="float-right">{{ $user->ministry->name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Simu</b> <a class="float-right">0{{ $user->phonenumber }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Taasisi</b> <a class="float-right">{{ $institutionname }}</a>
                    </li>

{{--                    <li class="list-group-item">--}}
{{--                        <b>Friends</b> <a class="float-right">13,287</a>--}}
{{--                    </li>--}}
                </ul>

{{--                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
            </div>
            <!-- /.card-body -->
        </div>
{{--        </div>--}}
@endsection






