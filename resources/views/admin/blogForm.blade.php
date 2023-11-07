@extends('admin.layouts.master')
@push('page_title')
    @if(isset($blog)) <!-- eğer bu bir edit sayfası ise  (viewa controller üzerinden gönderdiğimiz datayı kontrol ediyoruz)--> 
        {{ $blog->title}} Düzenleniyor!
    @else
        Blog Add <!-- blog değişkeni olmadığına göre bu bir yeni ekleme sayası -->
    @endif
@endpush

@section('content')
<div class="container">
    <form action="{{ isset($blog) ? route('admin.blogUpdate',[$blog]) : route('admin.blogStore')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Title : </label> <input type="text" name="title" value="{{isset($blog) ? $blog->title : ''}}"> 
        <label for="">Content : </label> <textarea name="content" id="" cols="30" rows="10">{{isset($blog) ? $blog->content : ''}}</textarea>
        <label for="">Header İmage : </label><input type="file" name="header_img" id="resim" accept="image/*" value="{{isset($blog) ? $blog->header_img : ''}}">
        <button type="submit">Update</button>
    </form>
   </div>
@endsection

@push('css')
<style>
    .container {
        text-align: center;
    }

    .container form {
        display: inline-block;
        text-align: left;
        border: 1px solid #ccc;
        padding: 20px;
        background-color: rgb(232, 122, 107);
    }

    .container form label, .container form input, .container form button {
        display: block;
        margin-bottom: 10px;
    }

    .container form button {
        margin: 0 auto;
        background-color:black;
        color: white;
        font-size: 16px;
    }
</style>
@endpush