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
                               : <span class="text-info">{{ $user_emailproj }}</span>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                               : <span class="text-info">{{$user_emaila}}</span>
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
                                    <th>Region</th>
                                    <th>Council</th>
                                    <th>school</th>
                                    <th>Book</th>
                                    <th>Book category</th>
                                    <th>Standard</th>
                                    <th>Number of Book</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoiceetails as $invoiceetail)
                                    <tr>
                                        <td>{{ ++$i }}.</td>
                                        <td>{{ $invoiceetail->region->name }}</td>
                                        <td>{{ $invoiceetail->council->name }}</td>
                                        <td>{{ $invoiceetail->school->name }}</td>
                                        <td>{{ $invoiceetail->book->name }}</td>
                                        <td>{{ $invoiceetail->book_category->name }}</td>
                                        <td>{{ $invoiceetail->book_category->standard->name }}</td>
                                        <td>{{ $invoiceetail->no }}</td>
                                        <td>{{ $nowdate }}</td>

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

