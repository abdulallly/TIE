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
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center text-info">Change password</h6>
                </div>
                <div class="card-body">
                            <form method="POST" action="{{ route('change.password') }}">
                                @csrf
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control"  placeholder="current password"  required name="current_password" autocomplete="current-password">
                                </div>
                                <div class="form-group">
                                    <input id="new_password" type="password" class="form-control" placeholder="new password" name="new_password" autocomplete="current-password" required>
                                </div>
                                <div class="form-group">
                                    <input id="new_confirm_password" type="password" class="form-control" placeholder="confirm password" name="new_confirm_password" autocomplete="current-password" required >
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </form>
                        </div>
            </div>
        </div>
    </section>
@endsection
