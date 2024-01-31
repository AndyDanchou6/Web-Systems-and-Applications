@extends('layouts.main')

@section('title', 'Chapters')

@section('content') 
@include('admin_includes.admin_navbar')

<div class="container-fluid col-7 mt-5">
    <h3>Title: {{ $data['chapter_title'] }}</h3>
</div>
<div class="container-fluid col-7 mt-5">
    <h3>Date:{{ $data['date'] }}</h3>
</div>
@if ($data['status'] == 1)
<div class="container-fluid col-7 mt-5">
    <h3>Status: Released</h3>
</div>
@elseif ($data['status'] == 2)
<div class="container-fluid col-7 mt-5">
    <h3>Status: Released Denied</h3>
</div>
@else
<div class="container-fluid col-7 mt-5">
    <h3>Status: Pending Release</h3>
</div>
@endif
<div class="container-fluid col-7 mt-5">
    <h3>Contents:</h3>
</div>
<div class="container-fluid col-7 mt-5">
    <p>{{ $data['contents'] }}</p>
</div>

@endsection