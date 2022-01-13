@extends('layouts.main')
@section('content')
   <div class="card">
            <div class="card-header">
                    <a href="#" class="btn  float-left  btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Invoice Details</a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <td class="text-info"><strong>{{ $id }}</strong></td>

                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Insertion ID</th>
                        <th>Region</th>
                        <th>Council</th>
                        <th>School</th>
                        <th>Standard</th>
                        <th>Book title</th>
                        <th>Book Category</th>
                        <th>Quantity</th>
                        <th>Female</th>
                        <th>Male</th>
                    </tr>
                    </thead>
                    @if($invoices->count() > 0)
                    <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_title }}</td>
                            <td>{{ $invoice->region->name }}</td>
                            <td>{{ $invoice->council->name }}</td>
                            <td>{{ $invoice->school->name }}</td>
                            <td>{{ $invoice->book->name }}</td>
                            <td>{{ $invoice->standard->name }}</td>
                            <td>{{ $invoice->book_category->name }}</td>
                            <td>{{ $invoice->no }}</td>
                            <td>{{ $studentcount->female }}</td>
                            <td>{{ $studentcount->male }}</td>

                        </tr>
                        <tr>

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

