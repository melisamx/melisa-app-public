@if (session('status'))
<div class="card-panel gren center-align">
    <span class="white-text">
        {{ session('status') }}
    </span>
</div>
<br>
@endif