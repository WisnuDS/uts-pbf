@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{$content["title"]}}</h5>
                        <p class="card-text">{{$content["body"]}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

