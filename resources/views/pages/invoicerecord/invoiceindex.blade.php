@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#" class="" >Please Select Invoices to see Invoice Records </a>
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
{{--            <form action="{{route('invoicereferences.store')}}" method="post" role="form" enctype="multipart/form-data">--}}
{{--                {{csrf_field()}}--}}
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    {{--                        <th>#</th>--}}
                    <th>Invoice No</th>
                    <th>Status</th>
                    <th> Generated  by </th>
                    <th>Generated Date</th>
                    <th>Confirmed Date by Statistical officer</th>
                </tr>
                </thead>
                @if($invoices->count() > 0)
                    @foreach ($invoices as $invoice)
                        <tr>

{{--                                <a href="{{ action('Product\ProductController@searchTags', ['tags_id' => $tags->id]) }}" id="tags">{{ $invoice->invoicerefnumber }}</a>--}}
                                <td><a href="{{ url('/invo/'.$schoolID.'/edit/'.$invoice->invoicerefnumber ) }}" >{{ $invoice->invoicerefnumber }}</a></td>

{{--                            <td>--}}

{{--                            </td>--}}
                         @if($invoice->generated_invoice==0)
                                <td>Invoices not generated </td>
                         @else
                             <td class="text-success"> Generated invoices</td>
                         @endif
                            <td> {{ $invoice->projectmanager->user->email }} </td>
                            <td>{{ $invoice->generated_date_by_proj }}  </td>
                           @if($invoice->accepted_date_by_stat==null)
                             <td class="text-center"> - </td>
                           @else
                             <td class="text-center">{{ $invoice->accepted_date_by_stat}}, <strong class="text-success"> Accepted by </strong> {{ $invoice->statisticalofficer->user->email }} </td>
                          @endif
{{--                            <td>--}}
{{--                                <div class="form-group">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-sm" value="{{ $invoice->invoicerefnumber }}"> {{ $invoice->invoicerefnumber  }}</button>--}}
{{--                                </div>--}}
{{--                            </td>--}}
                        </tr>

                    @endforeach
                    @else
                        <tr >
                            <td colspan="9" class="text-center">No invoice created yet !!</td>
                        </tr>
                @endif


            </table>
{{--            </form>--}}
        </div>
    </div>
@endsection



