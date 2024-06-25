@auth
    <div id='api-token' hidden data-api-token={{ auth()->user()->createToken('personal-token')->plainTextToken }}></div>
@endauth
