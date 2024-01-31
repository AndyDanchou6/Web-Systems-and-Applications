@extends('layouts.main')

@section('title', 'Admin Request Details')

@section('content') 
@include('admin_includes.admin_navbar')

<div class="container mt-5">
    <div class="container-fluid col-7 pt-5">  
        <h5>Title :</h5>            <p>{{ $data->title }}</p>
        <h5>Author :</h5>           <p>{{ $data->author }}</p>
        <h5>Genre :</h5>            <p>{{ $data->genre }}</p>
        <h5>Date of Request :</h5>   <p>{{ $data->date_of_request }}</p>
        <h5>Description :</h5>      <p>{{ $data->description }}</p>
    </div>
    <div class="container-fluid col-7 mt-5">
        <a href="{{ route('admin.edit_request', ['data' => $data]) }}" class="btn btn-success">Approve</a>
        <a href="{{ route('admin.req_deny', ['data' => $data]) }}" class="btn btn-danger">Deny</a>
    </div>
    <div class="container-fluid col-7 mt-5">
        <h1 class="mt-5">Chapters</h1>
        <div class="card mb-4">
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Chapter No.</th>
                                            <th>Title</th>
                                            <th>Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
    </div>
</div>
@endsection