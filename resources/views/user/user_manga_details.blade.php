@extends('layouts.main')

@section('title', 'User Manga Details')

@section('content') 
@include('user_includes.user_navbar')

<div class="container mt-5">
    <div class="container-fluid col-7 pt-5">  
        <h5>Title :</h5>            <p>{{ $data->title }}</p>
        <h5>Author :</h5>           <p>{{ $data->author }}</p>
        <h5>Genre :</h5>            <p>{{ $data->genre }}</p>
        <h5>Date Published :</h5>   <p>{{ $data->date_published }}</p>
        <h5>Description :</h5>      <p>{{ $data->description }}</p>
    </div>
    <div class="container-fluid col-7 mt-5">
        <a href="{{ route('user.chapter_lists', ['data' => $data->id]) }}" class="btn btn-secondary">Chapters</a>
    </div>
</div>