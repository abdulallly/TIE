@extends('layouts.main')
@section('content')
   <div class="card">
            <div class="card-header">
                Majibu ya Maswali
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Whoops!</strong> Kunatatizo katika Data zako<br><br>
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
                <form action="{{ route('insert') }}" enctype="multipart/form-data" class="btn-submit">
                        {!! csrf_field() !!}
                    @csrf
                    <input type="hidden" class="form-control" name="id"  value="{{ $maoni->id }}">
                    <div class="form-group">
                        <label>Swali</label>
                      <textarea class="form-control" id="sheria" disabled rows="3" name="name" required autofocus >{{$maoni->qstn}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Majibu</label>
                        <textarea class="form-control" id="sheria" rows="3" name="maoni"  required autofocus ></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Hifadhi</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
