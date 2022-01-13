@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-book"></i> DTLMMS,
                                <small class="float-right text-sm">Date:
                                   <span class="text-info">{{$years}}</span>
                                </small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                Email: <span class="text-info">projectmanager@gmail.com</span>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                Email: <span class="text-info">{{$useremail}}</span>
                            </address>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive table-bordered table-sm">
                            List of Books
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice Title</th>
                                    <th>Received Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoiceetails as $invoiceetail)
                                    <tr>
                                        <td>{{ ++$i }}.</td>
                                        <td>{{ $invoiceetail->invoice_title }}</td>
                                        <td>{{ $invoiceetail->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection

