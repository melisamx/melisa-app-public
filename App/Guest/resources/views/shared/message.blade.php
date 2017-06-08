@if (session('message'))
<div class="card-panel red center-align">
    <span class="white-text">
        {{ session('message') }}
    </span>
</div>
<br>
@endif