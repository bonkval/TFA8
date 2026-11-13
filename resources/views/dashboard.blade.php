@extends('layouts.pos')
@section('content')
<section class="page-intro"><div><div class="eyebrow">POS Lab / Signed in</div><h1>Dashboard</h1></div><p>Welcome, {{ auth()->user()->full_name }}. You're logged in and ready to manage your POS records.</p></section>
<section class="grid" aria-label="Account management">
<article class="feature"><h3>Customer accounts</h3><p>View contacts, create a customer, or update existing details.</p><a class="button" href="{{ route('customers.index') }}">Manage customers</a></article>
<article class="feature"><h3>User accounts</h3><p>Manage staff names, usernames, and profile pictures.</p><a class="button" href="{{ route('users.index') }}">Manage users</a></article>
<article class="feature"><h3>Your profile</h3><p>Update your sign-in email, name, or password.</p><a class="button" href="{{ route('profile.edit') }}">Edit profile</a></article>
</section>
@endsection
