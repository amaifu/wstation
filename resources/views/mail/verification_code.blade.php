@component('mail::message')

    <h1>Verification Code</h1>
    <p>Token for SignUp <span id="reg-email">{{ $email }}</span></p>
    <h2 id="reg-verif-code" style="letter-spacing: 10px; font-size: larger;">{{ $token }}</h2>
    <p>Don't tell anyone this is secret!</p>

@endcomponent