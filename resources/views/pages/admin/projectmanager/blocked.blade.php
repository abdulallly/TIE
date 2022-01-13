@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header text-center text-bold">
           Watumiaji waliozuiliwa
        </div>

        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-dismissible fade show">
                <p>{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(auth()->user()->hasRole('Super-Admin'))
        <div class="card-body">
{{--            WA SUPER ADMIN--}}
            Orodha ya watumiaji
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped  table-sm">
                    <thead>
                    <tr>
                        <th>S/No</th>
                        <th>Barua pepe</th>
                        <th>Cheo</th>
                        <th>Maelezo</th>
                        <th>Zuia Mtumiaji</th>
                        <th>Tukio</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($alluser->count() > 0)
                    @foreach ($alluser as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        {{ $v }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($user->status==0)
                                    Zuia
                                @else
                                    Ruhusu
                                @endif
                            </td>

                            <td>
                                {{--                                @can('admin-management')--}}

                                {{--                               @if( $user->email == auth()->user()->hasRole('Super-Admin'))--}}
                                @if ($user->email != Auth::user()->email)

                                    <input data-id="{{$user->id}}" class="js-switch" type="checkbox"
                                        {{ $user->status == 1 ? 'checked' : '' }}>
                                    {{----}}
                                    {{--                                @endif--}}
                                @endif
                                {{--                               @endcan--}}
                            </td>

                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    <a class="btn btn-primary btn-xs" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i> Onyesha</a>
                                    @can('user-edit')
                                        <a class="btn btn-info btn-xs" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i> Rekebisha</a>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @else
                        <tr >
                            <td colspan="7"><center>Hakuna Mtumiaji Aliezuiwa</center></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
{{--            {{ $alluser->links() }}--}}
        </div>
        @else
{{--            MAADMIN NA WA TU WA WIZARAA--}}
        <div class="card-body">
            @can('user-admin-management')
            Orodha ya watumiaji
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped  table-sm">
                    <thead>
                    <tr>
                        <th>S/No</th>
                        <th>Barua pepe</th>
                        <th>Cheo</th>
                        <th>Maelezo</th>
                        <th>Zuia Mtumiaji</th>
                        <th>Tukio</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($data->count() > 0)
                        @foreach ($data as $key => $user)

                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            {{ $v }}
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if($user->status==0)
                                        Zuia
                                    @else
                                        Ruhusu
                                    @endif
                                </td>

                                <td>
                                    {{--                                @can('admin-management')--}}

                                    {{--                               @if( $user->email == auth()->user()->hasRole('Super-Admin'))--}}
                                    @if ($user->email != Auth::user()->email)

                                        <input data-id="{{$user->id}}" class="js-switch" type="checkbox"
                                            {{ $user->status == 1 ? 'checked' : '' }}>
                                        {{----}}
                                        {{--                                @endif--}}
                                    @endif
                                    {{--                               @endcan--}}
                                </td>

                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                        @csrf
                                        <a class="btn btn-primary btn-xs" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i> Onyesha</a>
                                        @can('user-edit')
                                            <a class="btn btn-info btn-xs" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i> Rekebisha</a>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr >
                            <td colspan="7"><center>Hakuna Mtumiaji Aliezuiwa</center></td>
                        </tr>
                    @endif
                    </tbody>

                </table>
            </div>

{{--                {{ $data->links() }}--}}

           @endcan

{{--ADMIN WA TAASISI NA WATU WAKE--}}
            @can('normal-user-institution')
                    Orodha ya watumiaji

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped  table-sm">
                        <thead>
                        <tr>
                            <th>S/No</th>
                            <th>Barua pepe</th>
                            <th>Cheo</th>
                            <th>Maelezo</th>
                            @can('user-ban')
                            <th>Zuia Mtumiaji</th>
                            @endcan
                            <th>Tukio</th>
                        </tr>
                        </thead>
                        @foreach ($userinstitution as $key => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            {{ $v }}
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if($user->status==0)
                                        Zuia
                                    @else
                                        Ruhusu
                                    @endif
                                </td>
                                @can('user-ban')
                                <td>

                                    @if ($user->email != Auth::user()->email)
                                        <input data-id="{{$user->id}}" class="js-switch" type="checkbox"
                                            {{ $user->status == 1 ? 'checked' : '' }}>
                                    @endif
                                </td>
                                @endcan

                                <td>
{{--                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">--}}
{{--                                        @csrf--}}
                                        <a class="btn btn-primary btn-xs" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i> Onyesha</a>
                                        @can('user-edit')
                                            <a class="btn btn-info btn-xs" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i> Rekebisha</a>
                                        @endcan
{{--                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

{{--              {{ $userinstitution->links() }}--}}
           @endcan

         </div>

        @endif

    </div>
@endsection
