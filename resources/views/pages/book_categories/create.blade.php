@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Books Categories</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Book Categories Registration</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-lightblue">
                <div class="card-header text-info text-center">
                    Book Categories Registration
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('book_categories.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="col-md- control-label">Select Book</label>
                                <select class="form-control " name="book_id" required>
                                    <option value="">Please select Book</option>
                                    @foreach ($books as $book)
                                        <option value="{{$book->id}}">{{$book->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md- control-label">Select standard</label>
                                <select class="form-control " name="standard_id" required>
                                    <option value="">Please select standard</option>
                                    @foreach ($standards as $standard)
                                        <option value="{{$standard->id}}">{{$standard->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        Book category<button id="addRowsbookcategory" type="button" class="float-right btn  btn-sm mb-1"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new row</button>
                        <div class="form-group">
                            <div id="inputFormRowsbookcategory">
                                <div class="input-group mb-1">
                                    <input type="text" name="name[]" required class="form-control m-input" placeholder="Name of book category" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" autocomplete="on">
                                    <input type="number" name="quantity[]" required class="form-control m-input" placeholder="Quantity of book category" min="0" autocomplete="on">
                                    <div class="input-group-append">
                                        <button id="removeRowsbookcategory" type="button" class="btn btn-danger"><i class="" aria-hidden="true"></i>remove</button>
                                    </div>
                                </div>
                            </div>
                            <div id="newRowsbookcategory">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

