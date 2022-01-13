@extends('layouts.main')
@section('content')
        <div class="card">
            <div class="card-header">
                    Badili Taarifa za Mtumiaji
            </div>

            <div class="card-body">
                <div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>!!</strong> Kuna shida katika Data zako <br><br>
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
                </div>
                <form action="{{ route('users.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if($nullintitions==null)

                        <div class="form-group">
                            <label for="wizara" class="control-label">Chagua Wizara</label>
                            <select class="form-control" name="wizara_id" id="wizaraid" required>
                                @foreach ($wizaras as $wizara)
                                    <option value="{{ $wizara->id }}" {{ $wizara->id == $selectedvaluewizara ? 'selected' : '' }}>{{ $wizara->name }}</option>

                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="taasis" class="control-label">Chagua Taasis</label>
                            <select class="form-control" name="institution_id" id="taasisid" required>
                                @foreach ($institutions as $taasis)
                                    <option value="{{ $taasis->id }}" {{ $taasis->id == $selectedvaluetaasis ? 'selected' : '' }}>{{ $taasis->name }}</option>

                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="firstname" class="control-label">Jina la kwanza</label>
                            <input id="firstname" type="text" class="form-control" name="firstname" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" placeholder="Jina la kwanza" value="{{ $user->firstname }}" required autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="surname" class="control-label">Jina la Mwisho</label>
                            <input id="lastname" type="text" class="form-control" name="lastname"  placeholder="Jina la Mwisho" pattern="[a-zA-Z'-'\s]*" title="only string is allowed" value="{{ $user->lastname }}" required autofocus>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="title" class="control-label">Chagua Cheo</label>
                        <select class="form-control" name="roles" required>
                            @foreach ($roles as $role)
                                <option  {{ $role->name == $selectedvalue ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email" class="control-label">Barua pepe</label>
                            <input id="email" type="email" class="form-control" name="email"  placeholder="Barua pepe" value="{{ $user->email }}" required autofocus>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phonenumber" class="control-label">Namba ya simu</label>
                            <input id="phonenumber" type="text" class="form-control" name="phonenumber"  value="0{{ $user->phonenumber}}"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Hifadhi</button>
                    </div>
                </form>
            </div>

        </div>
@endsection
