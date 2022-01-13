@extends('layouts.main')
@section('content')
    <div class="card">
           <div class="card-header">
               <h6 class="text-center">Sent School Request  </h6>
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
              <div class="table-responsive">
                  <table class="table table-bordered table-striped table-sm">
                      <thead>
                      <tr>
                          <th>No</th>
                          <th>Book</th>
                          <th>Book Cateqory </th>
                          <th>Standard </th>
                          <th>Requested Quantity </th>
                      </tr>
                      </thead>
                      @if($schoolrequest->count() > 0)
                          <tbody>
                          @foreach ($schoolrequest as $feedback)
                              <tr role="row" class="odd">
                                  <td>{{ ++$i }}</td>
                                  <td >{{ $feedback->book->name }}</td>
                                  <td >{{ $feedback->book_category->name }}</td>
                                  <td >{{ $feedback->standard->name }}</td>
                                  <td >{{ $feedback->requested_quantity }}</td>
                              </tr>
                          @endforeach
                          @else
                              <tr >
                                  <td colspan="7" class="text-center">No request created yet</td>
                              </tr>
                          @endif
                          </tbody>
                  </table>
              </div>
       </div>
    </div>
@endsection
