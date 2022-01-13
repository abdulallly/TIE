@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header text-center text-info">
            @foreach($books as $book)
                {{$book->name}} Book with categories
            @endforeach
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered  table-striped table-sm">
                    <thead>
                    <tr>
                        <th>S/no</th>
                        <th>Book name</th>
                        <th>Book categories</th>
                        <th>Standard</th>
                    </tr>
                    </thead>
                    @if($books ->count() > 0)
                        <tbody>
                      @foreach ($books as $book)
                          <tr>
                              @foreach ($book->bookcategorys as $bcategory)
                              <tr>
                                  <td>{{ ++$i }}.</td>
                                  <td>{{$book->name}}</td>
                                  <td>{{$bcategory->name}}</td>
                                  <td>{{$bcategory->standard->name}}</td>
                              </tr>
                              @endforeach
                          </tr>
                       @endforeach
{{--foreach ($questions as $question){--}}
{{--echo "Category name is {$question->category->name} <br>";--}}

{{--}--}}
                        @else
                            <tr >
                                <td colspan="7" class="text-center">No book information created yet</td>
                            </tr>
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

