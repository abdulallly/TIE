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
{{--                        <th>#</th>--}}
                      <th>Invoices</th>
                      <th> Generated by</th>
                      <th>Generated Date</th>
                      <th>Confirmed Date by Statistical officer</th>

                    </tr>
                    </thead>
                    @if($invoices->count() > 0)
                    <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
{{--                            <td>{{ ++$i }}.</td>--}}
                            <td><a href="{{ url('/invoicerefnumbertitle/get',$invoice->invoicerefnumber) }}">{{ $invoice->invoicerefnumber }}</a></td>
                            @if($invoice->generated_date_by_proj==null)
                                <td class="text-center"> - </td>
                            @else
                                <td> {{ $invoice->projectmanager->user->email }} </td>
                                <td>{{ $invoice->generated_date_by_proj }} </td>

                            @endif
                            @if($invoice->accepted_date_by_stat==null)
                                <td class="text-center"> - </td>
                            @else
                                <td class="text-center">{{ $invoice->accepted_date_by_stat }} ,
                                    {{ $invoice->statisticalofficer->user->email }}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    @else
                        <tr >
                            <td colspan="9" class="text-center">No invoice generated yet !!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
@endsection

