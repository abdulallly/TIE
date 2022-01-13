@extends('layouts.main')
@section('content')
     <div class="card">
          <div class="card-header">
                      Send feedback
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
                                 <form class="form-horizontal" action="/storestatisticalofficerfeedbacktoregion" method="POST">
                                     @csrf
                                     <div class="form-group">
                                         <label>Feedback</label>
                                         <textarea class="form-control" id="sheria"  rows="3" name="feedback" placeholder="Write feedback to Project Manager" required autofocus ></textarea>
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

