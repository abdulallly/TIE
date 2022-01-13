        <p>Your account has been changed</p>
        <p>Please click on the link below to create a new password</p>
        @auth()
            <p><a href="{{url('').'/password/reset/' . $token  }}">Click link to create password</a></p>
        @endauth



