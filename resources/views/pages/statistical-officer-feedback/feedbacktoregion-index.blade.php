@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-center">Feedbacks Sent</h6>
        </div>
        <div class="card-header">
            <a href="{{ route('statisticalofficerfeedbacks.create') }}" class="btn  float-left btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Send new Feedbacks</a>
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
                        <th>Feedback </th>
                        <th>Answer</th>
                        {{--                          <th>Tukio</th>--}}
                    </tr>
                    </thead>
                    @if($feedbacks->count() > 0)
                        <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr role="row" class="odd">
                                <td>{{ ++$i }}</td>
                                <td >{{ $feedback->qstn }}</td>
                                @if($feedback->answer==null)
                                    <td><small class="text-success">No answer</small></td>
                                @else
                                    <td >{{ $feedback->answer }}</td>
                                @endif
{{--                                    <td >  {{ $feedback->region->name }}</td>--}}

                            </tr>
                        @endforeach
                        @else
                            <tr >
                                <td colspan="7" class="text-center">No feedback</td>
                            </tr>
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
