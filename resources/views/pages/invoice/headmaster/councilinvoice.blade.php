@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#" class="btn  float-left  btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Select Schools for Invoice</a>
        </div>
        <div class="card-body">
            List of invoice
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    {{--                        <th>#</th>--}}
                    {{--                        <th>Date</th>--}}
                    <th>Schools</th>
                </tr>
                </thead>
                @if($schools->count() > 0)
                    <tbody>
                    @foreach ($schools as $invoice)
                        <tr>
                            {{--                            <td>{{ ++$i }}.</td>--}}
                            <td><a href="{{ url('/schoolsInvoices/get',$invoice->id) }}">{{ $invoice->name }}</a></td>
                        </tr>
                    @endforeach
                    @else
                        <tr >
                            <td colspan="7" class="text-center">No invoice created yet !!</td>
                        </tr>
                    @endif
                    </tbody>
            </table>
        </div>
    </div>
@endsection

