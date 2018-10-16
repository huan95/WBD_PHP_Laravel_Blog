@extends('layouts.master')
@section('content')
    <div class="title m-b-md " style="color: white">
        <center><h1>Thêm Tin Tức Mới</h1></center>
    </div>
    <form method="post" action="{{ route('add') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group ">
            <label for="inputTitle" style="color: white">Title</label>
            <input type="text"
                   class="form-control"
                   id="inputTitle"
                   name="inputTitle"
                   required>
        </div>
        <div class="form-group">
            <label for="inputContent" style="color: white" >Content</label>
            <textarea class="form-control"
                      id="inputContent"
                      name="inputContent"
                      required></textarea>
        </div>
        <div class="form-group">
            <label for="inputFileName" style="color: white">File Name</label>
            <input type="text"
                   class="form-control"
                   id="inputFileName"
                   name="inputFileName">
            <input type="file"
                   class="form-control-file"
                   id="inputFile"
                   name="inputFile">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <a href="{{ route('information_index') }}" class="btn btn-info">BACK</a>
@endsection