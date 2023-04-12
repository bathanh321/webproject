@extends('app')
@section('content')
<div class ="row">
<a class="btn btn-success" href="{{url('create')}}">Create new</a>
<h1 style="text-align: center">Product table</h1>
</div>
<table class="table table-bordered">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Decription</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td><img src="/images/{{$product->image}}" alt="" width="400px" height="350px"></td>
        <td>{{$product ->name}}</td>
        <td>{{$product ->desc}}</td>
        <td>
            <form action="{{route('destroy', $product->id) }}" method="Post">
                <a class= "btn btn-info" href="{{route('show', $product ->id)}}">Show</a>
                <a class= "btn btn-warning" href="{{route('edit', $product ->id)}}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class= "btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
    
@endsection