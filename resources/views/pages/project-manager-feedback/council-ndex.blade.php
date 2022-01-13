@extends('layouts.main')
@section('content')
    <div class="card">
           <div class="card-header">
               <h6 class="text-center">Feedback from council</h6>
           </div>
{{--                    <div class="card-header">--}}
{{--                            <a href="{{ route('projectmanagerfeedbacks.create') }}" class="btn  float-left btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Notitication To School</a>--}}
{{--                    </div>--}}
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
                          <th>Council</th>
                          <th>Answer</th>
                          <th>Statistical officer</th>
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
                                  <td >{{ $maonis->council->name}}</td>
                                  @if($maonis->answer==null)
                                       <td ><small>No answer</small></td>

                                  @else
                                      <td >{{ $maonis->answer }}</td>

                                 @endif
                                  <td >{{ $maonis->statisticalofficer->firstname }} {{ $maonis->statisticalofficer->lastname }}</td>
{{--                                  <td >{{ $maonis->source }}</td>--}}
                                  <td>
                                      <a class="btn btn-info btn-xs" href="{{ route('projectmanagerfeedbacks.edit',$maonis->id) }}"><i class="fas fa-pencil-alt"></i>Answer</a>
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
