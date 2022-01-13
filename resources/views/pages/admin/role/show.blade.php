@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">List of permission</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <div class="card-title text-black">
                        List of permissions for role
                        {{--                        <span class="text-danger">--}}
                        {{--                           --}}
                        {{--                        </span>--}}
                        <span class="badge-success badge-sm badge-pill badge p-1">
                              {{$role->name}}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-light">
                        <tr>
                            <td class="tb_title">Permissions</td>
                            <td>
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        {{ ++$i }} -  <span class="text-success">
                                            {{ $v->name }}
                                        </span>
                                        <br>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
