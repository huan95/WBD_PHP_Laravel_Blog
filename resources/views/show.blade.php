@extends('layouts.master')
@section('content')
    <div class="title m-b-md " style="color: white">
        <center><h1>Thông Tin Chi Tiết</h1></center>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card text-left" style="width: 100%;">
                <div class="card-body">
                    <p>
                        <img src="{{ asset('storage/images/' . $information->image) }}" alt="" style="width: 150px">
                    </p>
                    <h5 class="card-title" style="color: black">{{ $information->title }}</h5>
                    <h6 class="card-text" style="color: black">{{ $information->content }}</h6><br>

                    <a href="{{ route('information_index') }}" class="btn btn-primary">< Quay lại </a>
                </div>
            </div>
        </div>
    </div>
@endsection