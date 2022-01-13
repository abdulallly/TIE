@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#" class="btn  float-left  btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Details of Invoices</a>


{{--            <div class="float-right">--}}
{{--                <form action="{{ route('allinvoicerecordds') }}" method="GET">--}}
{{--                    <input type="text" name="school" required/>--}}
{{--                    <button type="submit">Search</button>--}}
{{--                </form></div>--}}

        </div>
        <div class="card-body">
            Records of Invoice details
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
                    <th>Action</th>
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
                            <td>
                             <form action="{{ route('invoicesrecords.destroy',$invoice->id) }}" method="POST">
                                 @csrf
                                <a class="btn btn-info btn-xs" href="{{ route('invoicesrecords.edit',$invoice->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash"></i> Delete</button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr >
                            <td colspan="13" class="text-center">No records created yet !!</td>
                        </tr>
                    @endif
                    </tbody>
            </table>
        </div>
    </div>
@endsection

