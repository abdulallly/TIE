@extends('layouts.main')
@section('content')
   <div class="card">
            <div class="card-header">
                    <a href="#" class="" > Please Select Councils to see Invoice Records</a>
            </div>
            <div class="card-body">
                List of council
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
                        <th>Councils</th>
                    </tr>
                    </thead>
                    @if($councils->count() > 0)
                    <tbody>
                    @foreach ($councils as $invoice)
                        <tr>
                            <td>{{ ++$i }}.</td>
                            <td><a href="{{ url('/invoiceschoolrecords/get',$invoice->id) }}">{{ $invoice->name }}</a></td>
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

