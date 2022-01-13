@extends('layouts.main')
@section('content')
    <div class="container-fluid text-center">
        <div class="pt-5">
            <h2 class="headline text-danger"> 500</h2>
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Database connection not established</h3>
                <p>
                    We could not find  you were looking for.
                </p>
            </div>
        </div>
    </div>
@endsection
