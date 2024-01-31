@extends('layouts.main')

@section('title', 'Admin Requests')

@section('content') 
@include('admin_includes.admin_navbar')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-5">Publish Requests</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                        Time for Work, Admin
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Genre</th>
                                <th>Date of Request</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->title }}</td>
                                    <td>{{ $request->author }}</td>
                                    <td>{{ $request->genre }}</td>
                                    <td>{{ $request->date_of_request }}</td>
                                    <td><a href="{{ route('admin.req_details', ['data' => $request]) }}" class="btn btn-success">Details</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
