@extends('layouts.main')
@section('content')
    <div class="card">
            <div class="card-header">
                   Taarifa za wizara
            </div>
            <div class="card-body">
                <h6 class="card-title text-sm"><label>Jina:</label><span> {{ $wizaras->name }}</span></h6>
            </div>
    </div>
@endsection



