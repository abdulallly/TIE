@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <div class="pt-5">
        <h2 class="headline text-primary"> 404</h2>
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-primary"></i> Oops!Page not found</h3>
            <p>
                We could not find the page you were looking for.
                you may <a href="{{ route('home') }}">return to dashboard</a>
            </p>
        </div>
    </div>
</div>
@endsection
