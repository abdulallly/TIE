@extends('layouts.main')
@section('content')
     <div class="card">
          <div class="card-header">
                      Write Answer of Feedback
          </div>
           <div class="card-body">
                         @if (count($errors) > 0)
                   <div class="alert alert-danger alert-dismissible fade show">
                       Problems in Your Inputs<br><br>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif
                             @if ($message = Session::get('success'))
                                 <div class="alert alert-success alert-dismissible fade show">
                                     <p>{{ $message }}</p>
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                             @endif
                                 <form class="form-horizontal" action="{{ route('headmasterfeedbacksformmanager') }}" method="POST">
                                     @csrf
                                     <input type="hidden" class="form-control" name="id" value="{{  $Feedbackanswer->id }}">
                                     <div class="form-group">
                                         <label>Question</label>
                                         <textarea class="form-control" name="qstn" disabled rows="2">{{ $Feedbackanswer->qstn }}</textarea></td>
                                     </div>
                                     <div class="form-group">
                                         <label>Answers</label>
                                         <textarea class="form-control" id="sheria"  rows="3" name="answers" placeholder="Write answer here" required autofocus ></textarea>
                                     </div>

                                     <div class="form-group row">
                                         <div class=" col-sm-10">
                                             <button type="submit" class="btn btn-primary">Send</button>
                                         </div>
                                     </div>
                                 </form>

                </div>
     </div>
@endsection

