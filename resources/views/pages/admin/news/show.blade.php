@extends('layouts.main')
@section('content')
    <div class="card">
            <div class="card-header text-info text-center">
                       Region details
            </div>
            <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered  bg-light table-sm">
                                <thead>
                                    <th>Region name</th>
                                    <th>Council&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code</th>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>
                                      &nbsp;&nbsp;&nbsp;{{$regions->name}}
                                  </td>
                                  <td>
                                     @foreach($councils as $council)
                                            {{++$i}}:{{$council->council_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$council->council_code}}<br>
                                     @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                  </div>
        </div>
@endsection



