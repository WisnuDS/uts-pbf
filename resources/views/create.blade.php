@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(!empty($content))
                    <form method="POST" action="{{route('blog.update',[$content["id"]])}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{$content["title"]}}">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Body</label>
                                <textarea class="form-control" id="exampleInputPassword1" name="body">{{$content["body"]}}</textarea>
                            </div>
                            <input type="hidden" name="id" value="{{$content["id"]}}">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                @else
                <form method="POST" action="{{route('blog.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Body</label>
                        <textarea class="form-control" id="exampleInputPassword1" name="body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection
