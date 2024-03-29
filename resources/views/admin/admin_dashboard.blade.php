@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('content') 
    @include('admin_includes.admin_navbar')
            <div id="layoutSidenav_content col-10">
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
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Gender</th>
                                            <th>Date Published</th>
                                            <th>Method</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($all as $detail)
                                        <tr> 
                                            <td>{{ $detail->id }}</td>
                                            <td>{{ $detail->title }}</td>
                                            <td>{{ $detail->author }}</td>
                                            <td>{{ $detail->genre }}</td>
                                            <td>{{ $detail->date_published }}</td>
                                            <td> 
                                                <a href="{{ route('admin.details', ['data' => $detail]) }}" class="btn btn-success">Details</a>
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