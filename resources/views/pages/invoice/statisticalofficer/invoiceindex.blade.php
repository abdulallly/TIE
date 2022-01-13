@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#" class="btn  float-left  btn-xs" ><strong>Invoice Details</strong> </a>
        </div>
        <div class="card-body">
            Invoice Number :
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

                <td class="text-primary">{{ $invoiceno }}</td>
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>

                    <th>Insertion ID</th>
                    <th>Region</th>
                    <th>Council</th>
                    <th>School</th>
                    <th>Book title</th>
                    <th>Standard</th>
                    <th>Book Category</th>
                    <th>Quantity</th>
                    <th>Female</th>
                    <th>Male</th>
                    <th>Headmaster Confimartion</th>

                </tr>
                </thead>
                @if($invoicesDetails->count() > 0)
                    <tbody>
                    @foreach ($invoicesDetails as $invoice)
                        <tr>

                            <td>{{ $invoice->invoice_title }}</td>
                            <td>{{ $invoice->region->name }}</td>
                            <td >{{ $invoice->council->name }}</td>
                            <td >{{ $invoice->school->name }}</td>
                            <td >{{ $invoice->book->name }}</td>
                            <td >{{ $invoice->standard->name }}</td>
                            <td >{{ $invoice->book_category->name }}</td>
                            <td >{{ $invoice->no }}</td>
                            <td >{{ $studentcount->female }}</td>
                            <td >{{ $studentcount->male }}</td>
                            @if($invoice->received_invoice_by_head==0)
                            <td class="text-primary text-center">-</td>
                                @else
                                <td class="text-success">Accepted by {{ $invoice->headmaster->user->email }}</td>
                            @endif

                        </tr>
                        <tr>

                        </tr>

                    @endforeach
                    @else
                        <tr >
                            <td colspan="9" class="text-center">No invoice created yet !!</td>
                        </tr>
                    @endif
                    </tbody>
            </table>
        </div>
    </div>
@endsection

