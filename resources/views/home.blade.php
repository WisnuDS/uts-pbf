@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach(array_reverse($contents) as $content)
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">{{$content["title"]}}</h5>
                            <p class="card-text">{{$content["body"]}}</p>
                            <div class="row d-flex justify-content-end">
                                <a href="{{route('blog.show',[$content["id"]])}}" class="btn btn-primary mr-2">Read More</a>
                                <a href="{{route('blog.edit',[$content["id"]])}}" class="btn btn-warning mr-2">Edit</a>
                                <form class="" action="{{url('/blog',['id'=>$content["id"]])}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Delete" />
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
