@extends('admin.layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul>
                    <li><a href="/dashboard/attributes">Attributes</a></li>
                    <li><a href="/dashboard/other-attributes">Other Attributes</a></li>
                    <li><a href="/dashboard/rooms">Rooms</a></li>
                    <li><a href="/dashboard/blogs">Blog</a></li>

                </ul>
                <form action="/dashboard/blog/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pt-5 pb-5">
                        <label for="header">Header</label>
                        <input id="header" class="form-control" name="header" required/>
                        <label for="attr_hy">Content First</label>
                        <input id="attr_hy" class="form-control" name="content_first" required/>
                        <label for="attr_hy1">Content Second</label>
                        <input id="attr_hy1" class="form-control" name="content_second" required/>
                        <input type="file" id="attr_hy" class="form-control" name="img_first" required/>
                        <input type="file" id="attr_hy" class="form-control" name="img_second" required/>

                        <select name="theme" id="">
                            <option value="0">A</option>
                            <option value="1">B</option>
                        </select>
                        <select name="tag" id="">
                            <option value="0">A</option>
                            <option value="1">B</option>
                        </select>
                        <button class="btn btn-primary" type="submit"> Submit</button>
                    </div>


                </form>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Header</th>
                        <th scope="col">Content First</th>
                        <th scope="col">Content Second</th>
                        <th scope="col">Image First</th>
                        <th scope="col">Image Second</th>
                        <th scope="col">Theme</th>
                        <th scope="col">Tags</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $j = 1;
                    @endphp
                    @foreach($blogs as $k => $blog )
                        <tr>
                            <td>{{$j++}}</td>
                            <td>{{$blog->header}}</td>
                            <td>{{$blog->content_first}}</td>
                            <td>{{$blog->content_second}}</td>
                            <td><img src="/img/blogs/{{$blog->img_first}}" alt="main_image" width="150"></td>
                            <td><img src="/img/blogs/{{$blog->img_second}}" alt="second_image"  width="150"></td>
                            <td>{{$blog->theme}}</td>
                            <td>{{$blog->tags}}</td>

                            <td>
                                <a href="{{route("admin.blog.edit", $blog->id)}}">Edit</a>
                                <a href="{{route("admin.blog.delete", $blog->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
