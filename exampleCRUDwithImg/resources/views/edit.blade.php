@extends('app')
@section('content')
<div class="row">
<a class ="btn btn-primary" href="{{url('/')}}">Back</a>
</div>
<form action="{{route('update',$product ->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="desc" value="{{$product->desc}}" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" value="{{$product->image}}" class="form-control" placeholder="Image">
                <img src="/image/{{$product ->image}}" width="250px" alt="">
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <button type="submit">Submit</button>
        </div>
    </div>
</form>
    
@endsection