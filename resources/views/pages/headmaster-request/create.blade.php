@extends('layouts.main')
@section('content')
     <div class="card">
          <div class="card-header">
                      Send Request
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
                        @if ($message = Session::get('failed'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                <p>{{ $message }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                               <form class="form-horizontal" action="{{ route('headmasterrequests.store') }}" method="POST">
                                     @csrf
                                     <div class="form-group">
                                        <label class="col-md- control-label">Please Select Stardard</label>
                                          <select class="form-control " name="standard" required>
                                             <option value="">Please Select</option>
                                              @foreach ($schoolinformation  as $request)
                                                 <option value="{{$request->id}}">{{ $request->standard->name }}</option>
                                              @endforeach
                                          </select>
                                     </div>
                                    <div class="form-row">
                                     <div class="form-group col-md-6">
                                         <label class="col-md- control-label">Select Book Name</label>
                                         <select class="form-control " name="book_id" required>
                                             <option value="">Please Select Book name</option>
                                             @foreach ($books as $book)
                                                 <option value="{{$book->id}}">{{$book->name}}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="form-group col-md-6">
                                       <label class="col-md- control-label">Please Select Book Category</label>
                                         <select class="form-control" name="bookcategoryy_id" required id="bookcategoryy_id">
                                           <option value="">Please select Book category</option>
                                         </select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                   <label class="col-md- control-label">Number of Books</label>
                                   <input type="number" name="numbers" required class="form-control m-input" placeholder="Number of Books"  min="0" autocomplete="on">
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

