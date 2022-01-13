@extends('layouts.main')
@section('content')
    <div class="card">
           <div class="card-header">
               <h6 class="text-center">Sent School Request  </h6>
           </div>
                    <div class="card-header">
                            <a href="{{ route('headmasterrequests.create') }}" class="btn  float-left btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Write Request</a>
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
{{--                          <th>Action </th>--}}
                      </tr>
                      </thead>
                      @if($feedbacks->count() > 0)
                          <tbody>
                          @foreach ($feedbacks as $feedback)
                              <tr role="row" class="odd">
                                  <td>{{ ++$i }}</td>
                                  <td >{{ $feedback->book->name }}</td>
                                  <td >{{ $feedback->book_category->name }}</td>
                                  <td >{{ $feedback->standard->name }}</td>
                                  <td >{{ $feedback->requested_quantity }}</td>
{{--                                  <td>--}}
{{--                                      <form action="{{ route('headmasterrequest.destroy',$feedback->id) }}" method="POST">--}}
{{--                                          @csrf--}}
{{--                                          <a class="btn btn-info btn-xs" href="{{ route('newsuploads.edit',$feedback->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>--}}
{{--                                          @method('DELETE')--}}
{{--                                          <button type="submit" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash"></i> Delete</button>--}}
{{--                                      </form>--}}
{{--                                  </td>--}}
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
