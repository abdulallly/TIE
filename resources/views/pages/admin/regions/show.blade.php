@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Regions Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Regions</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
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
        </div>
    </section>
@endsection



