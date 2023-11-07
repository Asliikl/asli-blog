@extends('admin.layouts.master')
@push('page_title')
    Blogs
@endpush

@section('content')
<h1>Blog</h1>
    <div>
        <table border="1">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Header İmage</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->content}}</td>
                    <td>
                        <a target="_blank" href="{{$blog->header_img}}"><img style="width: 100px" src="{{$blog->header_img}}" /></a>
                    </td>
                    <td>
                        <a href="{{route('admin.blogEdit',[$blog])}}">Edit</a>
                    </td>
                    <td>
                        <a href="{{route('admin.blogDelete',[$blog])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection