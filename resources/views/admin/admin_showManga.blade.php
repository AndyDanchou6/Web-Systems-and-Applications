@extends('layouts.main')

@section('title', 'Admin Manga Details')

@section('content') 
@include('admin_includes.admin_navbar')

<div class="container mt-5">
    <div class="container-fluid col-7 pt-5">  
        <h5>Title :</h5>            <p>{{ $data->title }}</p>
        <h5>Author :</h5>           <p>{{ $data->author }}</p>
        <h5>Genre :</h5>            <p>{{ $data->genre }}</p>
        <h5>Date Published :</h5>   <p>{{ $data->date_published }}</p>
        <h5>Description :</h5>      <p>{{ $data->description }}</p>
    </div>
    <div class="container-fluid col-7 mt-5">
        <a href="{{ route('admin.edit', ['data' => $data]) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.delete', ['id' => $data]) }}" class="btn btn-danger">Delete</a>
        <a href="{{ route('chapters', ['data' => $data->id]) }}" class="btn btn-secondary">Chapters</a>
    </div>
    
</div>
@endsection