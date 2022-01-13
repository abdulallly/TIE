@extends('layouts.main')
@section('content')
   <div class="card">
            <div class="card-header">
                    <a href="{{ route('invoices.create') }}" class="btn  float-left  btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> add new invoice</a>
                    <a href="{{ route('generateinvoices') }}" class="btn  float-right  btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Generate invoice</a>
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
                        <th>#</th>
{{--                        <th>Date</th>--}}
                        <th>Region</th>
{{--                        <th>council</th>--}}
{{--                        <th>Action</th>--}}
                    </tr>
                    </thead>
                    @if($invoices->count() > 0)
                    <tbody>
                    @foreach ($regions as $invoice)
                        <tr>
                            <td>{{ ++$i }}.</td>
                            <td><a href="{{ url('/council/get',$invoice->id) }}">{{ $invoice->name }}</a></td>
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
            <div class="ml-3">
                {!! $invoices->links() !!}
            </div>
        </div>
@endsection

