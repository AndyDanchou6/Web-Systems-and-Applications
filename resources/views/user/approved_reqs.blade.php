@extends('layouts.main')

@section('title', 'User Approved Requests')

@section('content') 
    @include('user_includes.user_navbar')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-5">Approve Requests</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <div class="row">
                            <div class="col-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Pending Requests</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('user.pending_requests') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right" href="{{ route('user.pending_requests') }}"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Denied Requests</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('user.denied_requests') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right" href="{{ route('user.denied_requests') }}"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                              <i class="fas fa-table me-1"></i>
                                Start Reading Now
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Genre</th>
                                            <th>Date_of_Request</th>
                                            <th>Date_published</th>
                                            <th>Methods</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $reqs)
                                        <tr>
                                            <td>{{ $reqs->id }}</td>
                                            <td>{{ $reqs->title }}</td>
                                            <td>{{ $reqs->author }}</td>
                                            <td>{{ $reqs->genre }}</td>
                                            <td>{{ $reqs->date_of_request }}</td>
                                            <td>{{ $reqs->date_published }}</td>
                                            <td>
                                                <a href="{{ route('user.request_details_delete', ['data' => $reqs->id]) }}" class="btn btn-danger">Delete</a>
                                                <a href="{{ route('user.request_details', ['data' => $reqs]) }}" class="btn btn-success">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                @include('user_includes.user_footer')
            </div>
@endsection