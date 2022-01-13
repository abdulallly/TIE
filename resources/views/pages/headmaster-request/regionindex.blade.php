@extends('layouts.main')
@section('content')
   <div class="card">
        <div class="card-header">
            <a href="#" class="btn btn-xs float-left" > Please select regions to look School request </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                List of Regions
                <table class="table table-bordered table-striped bg-light table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Regions</th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach ($school_info as $school_infos)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <a class="" href="{{ route('councilindexreceived',$school_infos->id) }}"> {{$school_infos->name}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    <div class="pl-3">
        {!! $school_info->links() !!}
    </div>
</div>
@endsection
