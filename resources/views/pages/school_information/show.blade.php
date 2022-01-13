@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
          tarifa za sheria
        </div>
        <div class="card-body">
            <h6 class="card-title text-xs text-bold">Jina:</h6>
            <h6 class="card-text text-xs">{{ $sheria->name }}</h6>
        </div>
    </div>
@endsection
