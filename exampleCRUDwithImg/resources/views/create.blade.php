@extends('app')
@section('content')
<div class="row">
<a class ="btn btn-primary" href="{{url('/')}}">Back</a>
</div>
<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="desc" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="Image">
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <button type="submit">Submit</button>
        </div>
    </div>
</form>
 
@endsection