@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form class="col s12 push-m2 m8 push-l4 l4" role="form" method="POST" action="{{ url('/login') }}">
            
            {{ csrf_field() }}
            
            @include('shared.errors')
            
            <div id="remember-avatar" class="row">
                <div class="valign-wrapper">
                    <img id="avatar-photo" alt="" class="circle responsive-img avatar">
                </div>
                <p id="user-email"></p>
            </div>
            
            <div class="input-field inline col s12 email">
                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <label for="email" data-error="{{ $errors->first('email') }}" data-success="">USUARIO</label>
                @else
                <label for="email">USUARIO</label>
                @endif                
            </div>
            
            <div class="input-field inline col s12">
                <input id="password" type="password" class="validate" name="password" required>
                @if ($errors->has('password'))
                <label for="password" data-error="{{ $errors->first('password') }}">CONTRASEÑA</label>
                @else
                <label for="password">CONTRASEÑA</label>
                @endif
            </div>
            
            <div class="input-field col s12 remember">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Recuérdame</label>
            </div> 
            
            <div class="input-field col s12 center-align">
                <br><br>
                <button class="btn waves-effect waves-light" type="submit" name="action">Entrar</button>
            </div>
            
            <div class="input-field col s12 m12 l12 password-reset center-align">
                <a href="{{ url('/password/reset') }}">
                    Olvidé la contraseña
                </a>
            </div>
            
            <div class="input-field col s12 m12 l12 center-align">
                <a href="{{ url('/register') }}">
                    Regístrate
                </a>
            </div>
            
            <div id="change-signin" class="input-field col s12 m12 l12 center-align">
                <a href="#">
                    Ingrese con una cuenta diferente
                </a>
            </div>
            
            <div id="users-login">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Elige una cuenta</span>
                        <ul id="list-users-login" class="collection scale-transition"></ul>
                    </div>
                    <div class="card-action">
                        <button id="other-account" type="button" class="btn waves-effect waves-light">Con otra cuenta</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection

@section('footer')
<script src="js/login-avatars.js"></script>
@if (isset($mobile))
<script src="{{ $mobile }}"></script>
@endif
@endsection