{{--@extends('layouts.main')--}}
{{--@section('content')--}}
{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            <a href="#" class="" >Please Select Invoices to look Invoice Records            </a>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            List of invoice--}}
{{--            @if ($message = Session::get('success'))--}}
{{--                <div class="alert alert-success alert-dismissible fade show">--}}
{{--                    <p>{{ $message }}</p>--}}
{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <table class="table table-bordered table-striped table-sm">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    --}}{{--                        <th>#</th>--}}
{{--                    <th>Book title</th>--}}
{{--                    <th>Book Category</th>--}}
{{--                    <th>Standard</th>--}}
{{--                    <th>Quantity</th>--}}


{{--                </tr>--}}
{{--                </thead>--}}
{{--                @if($invoices->count() > 0)--}}
{{--                    <tbody>--}}
{{--                    @foreach ($invoices as $invoice)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $invoice->book->name }}</td>--}}
{{--                            <td>{{ $invoice->book_category->name }}</td>--}}
{{--                            <td>{{ $invoice->standard->name }}</td>--}}

{{--                            <td>{{ $invoice->no }}</td>--}}


{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    @else--}}
{{--                        <tr >--}}
{{--                            <td colspan="7" class="text-center">No invoice created yet !!</td>--}}
{{--                        </tr>--}}
{{--                    @endif--}}
{{--                    </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

