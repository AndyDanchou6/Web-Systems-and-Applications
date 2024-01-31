@extends('layouts.main')

@section('title', 'New Chapters')

@section('content') 
    @include('admin_includes.admin_navbar')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-5">Library</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                              <i class="fas fa-table me-1"></i>
                                New Update
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Chapter Title</th>
                                            <th>Manga ID</th>
                                            <th>Date</th>
                                            <th><3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $chapter)
                                        <tr>
                                            <td>{{  $chapter->chapter_title }}</td>
                                            <td>{{  $chapter->manga_id }}</td>
                                            <td>{{  $chapter->date}}</td>
                                            <td>
                                                <a href="{{ route('admin.view_chapters', ['data' => $chapter->id]) }}" class="btn btn-success">Details</a>
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