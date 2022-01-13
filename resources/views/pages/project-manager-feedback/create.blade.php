@extends('layouts.main')
@section('content')
     <div class="card">
          <div class="card-header">
                      Weka swali na Majawabu
          </div>
           <div class="card-body">
                         @if (count($errors) > 0)
                   <div class="alert alert-danger alert-dismissible fade show">
                       Kunashida katika Taarifa zako<br><br>
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
                                 <form class="form-horizontal" action="{{ route('projectmanagerfeedbacks.store') }}" method="POST">
                                     <div class="form-row">
                                         <div class="form-group col-md-6">
                                             <label class="col-md- control-label">Select Region</label>
                                             <select class="form-control" name="region_id" required id="region_id">
                                                 <option value="">Please select Region</option>
                                                 @foreach ($regions as $region)
                                                     <option value="{{$region->id}}">{{$region->name}}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label class="col-md- control-label">Select Council</label>
                                             <select class="form-control " name="council_id" required id="council_id">
                                                 <option value="">Please select Councils</option>
                                             </select>
                                         </div>
                                     </div>
                                     @csrf
{{--                                     <input type="hidden" class="form-control" name="feedbacks" value="Wizara ya Katiba na Sheria">--}}
                                     <div class="form-group">
                                         <label>Feedbacks</label>
                                         <textarea class="form-control" id="sheria"  rows="3" name="feedback" placeholder="Write feedbacks" required autofocus ></textarea>
                                     </div>

                                     <div class="form-group row">
                                         <div class=" col-sm-10">
                                             <button type="submit" class="btn btn-primary">Tuma</button>
                                         </div>
                                     </div>
                                 </form>

                </div>
     </div>
@endsection

