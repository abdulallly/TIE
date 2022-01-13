@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header text-info text-center">
            Update Information
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Whoops!</strong> There were some problems with your input.<br>
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
                <form class="form-horizontal" role="form" method="POST" action="{{ route('invoicesrecords.update',$schoolinformation->id) }}">
                    @csrf
                    @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Select Region</label>
                        <select class="form-control" name="regions_id" required  disabled>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}" {{ $region->id == $selectedvalueregion_id ? 'selected' : '' }}>{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Select Council</label>
                        <select class="form-control " name="councils_id" required  disabled>
                            @foreach($councils as $council)
                                <option value="{{ $council->id }}" {{ $council->id == $selectedvaluecouncil_id ? 'selected' : '' }}>{{ $council->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-md- control-label">Select School</label>
                        <select class="form-control " name="schools_id"  disabled>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}" {{ $school->id == $selectedvalueschool_id ? 'selected' : '' }}>{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="col-md- control-label">Select Standards</label>
                        <select class="form-control " name="standard_id" required disabled>
                            <option value="">Please Select Stardard</option>
                            @foreach ($standards as $book)
                                <option value="{{$book->id}}"{{ $book->id == $selectedvaluestandard_id ? 'selected' : '' }} >{{$book->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md- control-label">Select Book Name</label>
                        <select class="form-control " name="book_id" required disabled>
                            <option value="">Please Select Book name</option>
                            @foreach ($books as $book)

                                <option value="{{$book->id}}" {{ $book->id == $selectedvaluebook_id ? 'selected' : '' }}>{{$book->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
{{--                <div class="form-row">--}}
                <div class="form-group">
                    <label class="col-md- control-label">Please Select Book Category</label>
                    <select class="form-control" name="bookcategory_id" required id="bookcategory_id" disabled>
                        <option value="">Please select Book category</option>
                        @foreach ($bookcategorys as $book)
                            <option value="{{$book->id}}"{{ $book->id == $selectedvaluebookcategory_id ? 'selected' : '' }}>{{$book->name}}</option>
                        @endforeach
                    </select>
                </div>

{{--                <div class="form-row">--}}
                <div class="form-group">
                    <label class="col-md- control-label">Number of Books</label>
                    <input type="number" name="numbers" required class="form-control m-input" value="{{$schoolinformation->no}}" placeholder="Number of Books"  min="0" autocomplete="on">
                </div>
{{--                </div>--}}

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection

