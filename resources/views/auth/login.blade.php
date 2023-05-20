@extends('layout')

@section('content')

    <div class="card" >
        <div class="container-login">

            <form method="post" action="{{ route('login.perform') }}" >
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        
                        <h1 class="header" style="top: -30vh;">Pieslēgšanās</h1>
    
                        @include('layouts.partials.messages')
    
                        <div class="login" >
                            <div style="margin:10px; color:white;">
                                <label for="floatingName">E-pasts vai Lietotājvārds</label>
                            </div>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus style="border-radius:10px; padding:10px; width:30%">
                            @if ($errors->has('username'))
                                <span class="text-danger text-left" class="danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        
                        <div class="login">
                            <div style="margin:10px; color:white;">
                                <label for="floatingPassword">Parole</label>
                            </div>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required" style="border-radius:10px; padding:10px; width:30%">
                            @if ($errors->has('password'))
                                <span class="danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        
                        <div class="login-button">
                            <button type="submit" style="border-radius:10px; padding:10px; margin:10px; width:15%">Pieslēgties</button>
                        </div>
                                    
            </form>
        </div>
    </div>
@endsection