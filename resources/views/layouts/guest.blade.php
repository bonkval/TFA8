@extends('layouts.pos')
@section('content')
<section class="auth-shell">
<div class="eyebrow">POS Lab / Account access</div>
<h1>{{ request()->routeIs('register') ? 'Register' : (request()->routeIs('login') ? 'Log in' : 'Account security') }}</h1>
<div class="card auth-card">{{ $slot }}</div>
@if(request()->routeIs('login'))<p class="field-help">New to POS Lab? <a href="{{ route('register') }}">Create an account</a> to manage customers and users.</p>@endif
</section>
@endsection
