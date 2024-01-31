@extends('layouts.main')

@section('title', 'User Manage Accounts')

@section('content') 
@include('user_includes.user_navbar')

<div class="container col-7">
    <form method="post" action="{{ route('user.update') }}">
        @csrf 
        @if (auth()->check())
        
        <div class="mt-5 pt-5">
            <h6>ID</h1>
            <p>{{ auth()->user()->id }}</p>
        </div>
        <div class="mt-5">
            <h6>Name</h1>
            <input type="text" name="name" placeholder="{{ auth()->user()->name }}"/>
        </div>
        <div class="mt-5">
            <h6>Email</h1>
            <input type="text" name="email" placeholder="{{ auth()->user()->email }}"/>
        </div>
        <div class="mt-5">
            <h6>Password</h1>
            <input type="text" name="password" placeholder="@change password"/>
        </div>
        <button type="submit" class="bg-primary mt-5">Update</button>
        @else 
        <h5>Can't Fetch User</h5>
        @endif
    </form>
</div>

@endsection