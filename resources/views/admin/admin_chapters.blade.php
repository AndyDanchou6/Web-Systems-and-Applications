@extends('layouts.main')

@section('title', 'Admin Manga Chapters')

@section('content') 
@include('admin_includes.admin_navbar')
<div class="container-fluid col-7 mt-5">
        <h1 class="mt-5">Chapters</h1>
        <div class="card mb-4">
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Chapter Title.</th>
                                            <th>Date Released</th>
                                            <th><3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $chap)
                                        <tr>
                                            <td>{{ $chap->chapter_title }}</td>
                                            <td>{{ $chap->date }}</td>
                                            <td>
                                                <a href="{{ route('admin.single_chap', ['data' => $chap->id]) }}" class="btn btn-success">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
    </div>
@endsection