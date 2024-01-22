@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="text-right">
            <a href="products/create" class="btn btn-dark mt-3">New User</a>
        </div>
        <br>          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->lname}}</td>
        <td>{{$product->email}}</td>
<td>
  <img src="products/{{$product->image}}" class="rounded-circle" width="50" height="50"/>
</td>
<td>
  <a href="/products/{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>


  <form method="POST" class="d-inline" action="products/{{$product->id}}/delete">
    @csrf 
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
  </form>
</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
    </div>
@endsection