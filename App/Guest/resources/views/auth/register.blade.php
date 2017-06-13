@extends('layouts.app')

@section('content')
<div class="container register">
    <div class="row">
        <div class="col s12 m8 l6 offset-m2 offset-l3 offset-xl3">
            <form role="form" method="POST" action="{{ url('/register') }}" class="card">
                {{ csrf_field() }}
                <div class="card-content">
                    
                    <div class="row">
                        <span class="card-title col s12">Registro</span>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required autofocus>
                            <label for="name" data-error="{{ $errors->has('name') ? $errors->first('name') : '' }}">Nombre</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
                            <label for="email" data-error="{{ $errors->has('email') ? $errors->first('email') : 'Correo invalido' }}" class="active">Correo electrónico</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input id="password" type="password" class="validate {{ $errors->has('password') ? 'invalid' : '' }}" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="La contraseña debe contener al menos 6 caracteres, incluyendo números MAYÚSCULAS y minúsculas">
                            <label for="password" data-error="{{ $errors->has('password') ? $errors->first('password') : 'La contraseña debe contener al menos 8 caracteres, incluyendo números MAYÚSCULAS y minúsculas' }}">Contraseña</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input id="password-confirm" type="password" class="validate" name="password_confirmation" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="La contraseña debe contener al menos 6 caracteres, incluyendo números MAYÚSCULAS y minúsculas">
                            <label for="password-confirm" data-error="{{ $errors->has('password') ? $errors->first('password') : 'La contraseña debe contener al menos 8 caracteres, incluyendo números MAYÚSCULAS y minúsculas' }}">Confirmar contraseña</label>
                        </div>
                    </div>
                    
                </div>
                <div class="card-action">
                    <button type="submit" class="waves-effect waves-light btn">
                        Registrar
                    </button>
                    <a href="{{ route('home') }}" class="right cancel">
                        Cancelar registro
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
