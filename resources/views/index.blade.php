@extends('layouts.master')
@section('content')
        <div class="title m-b-md " style="color: white">
            Tin Tức
        </div>

        <div class="row">
            @foreach($informations as $key => $information)
                <div class="col-4">
                    <div class="card text-left" style="width: 18rem;">
                        <div class="card-body">
                            <p>
                                <img src="{{ asset('storage/images/' . $information->image) }}" alt=""
                                     style="width: 150px">
                            </p>
                            <h5 class="card-title" style="color: black">{{ $information->title }}</h5>
                            <p class="card-text" style="color: black">{{ $information->content }}</p>

                            <a href="{{route('show', $information->id)}}" class="btn btn-primary">Xem</a>
                            <a href="{{route('information_delete', $information->id)}}"
                               onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-primary">Xóa</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div><a href="{{route('information_add', $information->id)}}" class="btn btn-primary">Thêm Mới</a></div>
@endsection
