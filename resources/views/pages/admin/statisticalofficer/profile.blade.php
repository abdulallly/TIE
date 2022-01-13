{{--@extends('layouts.main')--}}
{{--@section('content')--}}
{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            <div class="card-title">--}}
{{--                Taarifa za Mtumiaji--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <table class="table table-bordered">--}}
{{--                <tr>--}}
{{--                    <td class="tb_title"><b>Jina la Kwanza</b></td>--}}
{{--                    <td class="tb_title"><b>Jina la Mwisho</b></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}

{{--                    <td>{{ $userInfo->firstname }}</td>--}}
{{--                    <td>{{ $userInfo->lastname }}</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td class="tb_title"><b>Cheo</b></td>--}}
{{--                    <td class="tb_title"><b>Namba ya Simu</b></td>--}}
{{--                    <td class="tb_title"><b>Barua pepe</b></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        @if(!empty($userInfo->getRoleNames()))--}}
{{--                            @foreach($userInfo->getRoleNames() as $v)--}}
{{--                                {{ $v }}--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>0{{ $userInfo->phonenumber }}</td>--}}
{{--                    <td>{{ $userInfo->email }}</td>--}}
{{--                </tr>--}}

{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.main')
@section('content')
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
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
@endsection






