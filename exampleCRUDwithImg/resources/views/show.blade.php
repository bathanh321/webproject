@extends('app')
@section('content')
<div class="row">
<a class ="btn btn-primary" href="{{url('/')}}">Back</a>
</div>
<form action="{{route('update',$product ->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{$product->name}}
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{$product->desc}}
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/image/{{$product ->image}}" width="250px" alt="">
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <button type="submit">Submit</button>
        </div>
    </div>
</form>
    
@endsection