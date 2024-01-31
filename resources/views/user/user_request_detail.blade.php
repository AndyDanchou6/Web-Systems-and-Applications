@extends('layouts.main')

@section('title', 'User Request Details')

@section('content') 
@include('user_includes.user_navbar')

<div class="container mt-5">
    <div class="container-fluid col-7 pt-5">  
        <h5>Title :</h5>            <p>{{ $data->title }}</p>
        <h5>Author :</h5>           <p>{{ $data->author }}</p>
        <h5>Genre :</h5>            <p>{{ $data->genre }}</p>
        <h5>Date Of Request :</h5>   <p>{{ $data->date_of_request }}</p>
        <h5>Description :</h5>      <p>{{ $data->description }}</p>
    </div>
        @if ($data->status == '1')
        <div class="container-fluid col-7 mt-5">
            <a href="{{ route('user.update_manga', ['data' => $data->title]) }}" class="btn btn-primary">Update</a>
        </div>
        @elseif ($data->status == '2')
        <div class="container-fluid col-7 mt-5">
            <h3 class="bg-danger">Publish Denied</h3>
        </div>
        @else
        <div class="container-fluid col-7 mt-5">
            <h3>Under Inspection</h3>
        </div>
        @endif
    <div class="container-fluid col-7 mt-5">
        <h1 class="mt-5">Chapters</h1>
        <div class="card mb-4">
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Release Date</th>
                                            <th><3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->chapter_title }}</td>
                                            <td>{{ $data->date }}</td>
                                            <td>
                                                <a href="{{ route('user.chapter_view', ['data' => $data->id]) }}" class="btn btn-success">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    </div>
</div>
@endsection