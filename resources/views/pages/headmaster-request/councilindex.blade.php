@extends('layouts.main')
@section('content')
   <div class="card">
        <div class="card-header">
            <a href="#" class="btn btn-xs float-left" > Please select Council to look School request  </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                List of Council
                <table class="table table-bordered table-striped bg-light table-sm">
                    <thead>
                    <tr>
                        <td>#</td>

                        <th>Council</th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach ($school_request as $school_infos)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                  <a class="" href="{{ route('schooindexreceived',$school_infos->id) }}">{{$school_infos->name}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    <div class="pl-3">
        {!! $school_request->links() !!}
    </div>
</div>
@endsection
