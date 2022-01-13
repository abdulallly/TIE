@extends('layouts.main')
@section('content')
    <div class="card">
           <div class="card-header">
               <h6 class="text-center">Feedback from School</h6>
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
                          <th>Feedbacks</th>
                          <th>Regions</th>
                          <th>School</th>
                          <th>Answer</th>
                          <th>Headmaster</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      @if($feedbacks->count() > 0)
                          <tbody>
                          @foreach ($feedbacks as $maonis)
                              <tr role="row" class="odd">
                                  <td>{{ ++$i }}</td>
                                  <td >{{ $maonis->qstn }}</td>
                                  <td >{{ $maonis->region->name }}</td>
                                  <td >{{ $maonis->school->name }}</td>
                                  @if($maonis->asnwer=null)
                                  <td >{{ $maonis->answer }}</td>
                                  @else
                                      <td ><small>No answer</small></td>
                                 @endif
                                  <td >{{ $maonis->headmaster->firstname }} {{ $maonis->headmaster->lastname }}</td>
{{--                                  <td >{{ $maonis->source }}</td>--}}
                                  <td>
                                      <a class="btn btn-info btn-xs" href="{{ route('schooledit',$maonis->id) }}"><i class="fas fa-pencil-alt"></i>Answer</a>
                                  </td>
                              </tr>
                          @endforeach
                          @else
                              <tr >
                                  <td colspan="7" class="text-center">No information availlable</td>
                              </tr>
                          @endif
                          </tbody>
                  </table>
              </div>
       </div>
    </div>
@endsection
