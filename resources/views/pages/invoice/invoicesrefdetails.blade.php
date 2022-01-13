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
                        <th>Insertion ID</th>
                        <th>Inserted date</th>
                        <th>Inserted by</th>
                        <th>School</th>
                        <th>Region</th>
                        <th>Council</th>
                        <th>Book title</th>
                        <th>Standard</th>
                        <th>Book Category</th>
                        <th>Quantity</th>
                        <th>Headmaster confirmation</th>
                    </tr>
                    </thead>
                    @if($invoicesDetails->count() > 0)
                    <tbody>
                    @foreach ($invoicesDetails as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_title }}</td>
                            <td>{{ $invoice->created_date_by_proj }}</td>
                            <td>{{ $invoice->projectmanagerinsert }}</td>
                            <td>{{ $invoice->school->name }}</td>
                            <td>{{ $invoice->region->name }}</td>
                            <td>{{ $invoice->council->name }}</td>
                            <td>{{ $invoice->book->name }}</td>
                            <td>{{ $invoice->standard->name }}</td>
                            <td>{{ $invoice->book_category->name }}</td>
                            <td>{{ $invoice->no }}</td>
                            @if($invoice->received_invoice_by_head==0)
                                <td class="text-success text-center"> - </td>
                            @else
                                <td><a href="#">Accepted by {{ $invoice->headmaster->user->email }}</a></td>
                            @endif
                        </tr>
                    @endforeach
                    @else
                        <tr >
                            <td colspan="12" class="text-center">No invoice created yet !!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
@endsection

