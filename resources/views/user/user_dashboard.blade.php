@extends('layouts.main')

@section('title', 'User Dashboard')

@section('content') 
@include('user_includes.user_navbar')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-5">Dashboard</h1>
                        
                        
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
                                            <th>Date_published</th>
                                            <th>Methods</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_all as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->author }}</td>
                                            <td>{{ $data->genre }}</td>
                                            <td>{{ $data->date_published }}</td>
                                            <td>
                                            <a href="{{ route('user.manga_details', ['data' => $data]) }}" class="btn btn-success">Details</a>
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