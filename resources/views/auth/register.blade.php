@extends('layout')

@section('content')

    <div class="card">
        <div class="container-register ">

            <form method="post" action="{{ route('register.perform') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                
                <h1 class="header" style="top: -30vh;">Reģistrācija</h1>

                <div class="login">
                    <div>
                        <label for="floatingEmail" style="margin:10px; color:white;">E-pasta adrese</label>
                    </div>
                    <ul style="color:white; margins:20px;">
                        @if ($errors->has('email'))
                            <span class="text-danger text-left" >{{ $errors->first('email') }}</span>
                        @endif 
                    </ul>                   
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus style="border-radius:10px; padding:10px; width:30%; margin:10px;">
                </div>

                <div class="login">
                    <div>
                      <label for="floatingName" style="margin:10px; color:white;">Lietotājvārds</label>        
                    </div>
                    <ul style="color:white; margins:20px;">
                        @if ($errors->has('username'))
                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                        @endif
                    </ul>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus style="border-radius:10px; padding:10px; width:30%; margin:10px;">
                </div>
                
                <div class="login">
                    
                    <div>
                        <label for="floatingPassword" style="margin:10px; color:white;">Parole</label>
                    </div>
                    
                    <ul style="color:white; margins:20px;">
                        @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </ul>

                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required" style="border-radius:10px; padding:10px; width:30%; margin:10px;">

                </div>

                <div class="login">
                    <div>
                        <label for="floatingConfirmPassword" style="margin:20px; color:white;">Atkārtoti Parole</label>  
                    </div>                    
                    
                    <ul style="color:white; margins:10px;">
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </ul>

                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required" style="border-radius:10px; padding:10px; width:30%; margin:10px;">
                </div>
                
                <button class="register-button" style="border-radius:10px; padding:10px; margin:10px; width:15%; margin-left:38vh;" type="submit">Reģistrēties</button>

            </form>
        </div>
    </div>
@endsection