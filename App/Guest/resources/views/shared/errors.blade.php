@if ($errors->has('email') || $errors->has('password'))
<div class="card-panel red center-align">
    <span class="white-text">
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
    </span>
</div>
<br>
@endif