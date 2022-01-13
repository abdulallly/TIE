@extends('layouts.main')
@section('content')
    <div class="card">
           <div class="card-header">
               <h6 class="text-center text-info">Feedback from School</h6>
               <hr>
{{--               <a href="{{ route('statisticalofficerfeedbacks.create') }}" class="btn  float-left btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Send new comment</a>--}}
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
                 <a href="#" class="btn  float-left btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Please Answer Feedback School Below</a>

                   <div class="table-responsive">
                       <table class="table table-bordered table-striped table-sm">
                           <thead>
                           <tr>

                               <th>No</th>
                               <th>Feedback</th>
                               <th>School</th>
                               <th>Headmaster</th>
                               <th>Answer</th>
                               <th>Action</th>
                           </tr>
                           </thead>

                               <tbody>
                               @if($feedbacks->count() > 0)
                               @foreach ($feedbacks as $feedback)
                                   <tr role="row" class="odd">
                                       <td>{{ ++$i }}</td>

                                       <td >{{ $feedback->qstn }}</td>
                                       <td >{{ $feedback->school->name }}</td>
                                       <td >{{ $feedback->headmaster->firstname }} {{ $feedback->headmaster->lastname }}</td>
                                       @if($feedback->answer==null)
                                           <td ><small class="text-indigo">No answer</small></td>
                                           <td>
                                               <a class="btn btn-info btn-xs" href="{{ route('statisticalfeedbacks',$feedback->id) }}"><i class="fas fa-pencil-alt"></i>Answer</a>
                                           </td>
                                       @else
                                           <td >{{ $feedback->answer }} </td>
                                           <td>
                                               <a class="btn btn-info btn-xs" href="#"><i class="fas fa-archive"></i>Answered</a>
                                           </td>
                                       @endif

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
