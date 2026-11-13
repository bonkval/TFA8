@extends('layouts.pos')
@section('content')
<section class="page-intro"><div><div class="eyebrow">About the project</div><h1>{{ $heading }}</h1></div><p>This activity demonstrates a database-backed POS system using Laravel's MVC structure. The routes map URLs to controller methods, and the controllers pass page data to reusable views.</p></section>
<section class="card about-panel"><p>TFA8 adds conventional resource routes and Laravel Breeze authentication. Log in or register to manage customer and user records. Validated forms, pre-filled edit pages, and profile picture uploads continue from TFA7. Intervention Image prepares square thumbnails, Laravel stores them on the public disk, and the account directory displays each avatar or a placeholder.</p></section>
@endsection
