@extends('layouts.main')

@section('title', 'Admin Manage Accounts')

@section('content') 
@include('admin_includes.admin_navbar')

<div id="layoutSidenav_content col-10">
                <div class="container pt-5 col-7">
                <form method="post" action="{{ route('admin.change_pass') }}">
        @csrf 
        @if (auth()->check())

        <div class="mt-5">
            <h6>Name</h1>
            <p>{{ auth()->user()->name }}</p>
        </div>
        <div class="mt-5">
            <h6>Email</h1>
            <p>{{ auth()->user()->email }}</p>
        </div>
        <div class="mt-5">
            <h6>Password</h1>
            <input type="text" name="password" placeholder="@change password"/>
        </div>
        <button type="submit" class="bg-danger mt-5">Change Password</button>
        @else 
        <h5>Can't Fetch User</h5>
        @endif
    </form>
                </div>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-5">Users</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                              <i class="fas fa-table me-1"></i>
                                Start Reading Now
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Method</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr class="mx-3"> 
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td> 
                                                <a href="#" class="btn btn-success">Message</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main> 
            @include('admin_includes.admin_footer')
        </div>
@endsection