        <p class="bg-gradient-primary">Hellow <b>{{$user->firstname }} {{$user->lastname}}</b>,  </p>
        <p>You have successfully registered to DTLMMS</p>
        <p>Please click on the link below to create your password</p>
        @auth()
            <p><a href="{{url('').'/password/reset/' . $token  }}">Click link to Create password</a></p>
        @endauth

