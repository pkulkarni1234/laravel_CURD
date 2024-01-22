@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
            
            <form method="POST" action="/products/{{$product->id}}/update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="name" class="form-control"
                value="{{old('name',$product->name)}}"/>
                @if($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lname" 
                class="form-control"  value="{{old('lname',$product->lname)}}"/>
                @if($errors->has('lname'))
                <span class="text-danger">{{$errors->first('lname')}}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control"
                value="{{old('email',$product->email)}}"/>
                @if($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control"
                value="{{old('image',$product->image)}}"/>
                @if($errors->has('image'))
                <span class="text-danger">{{$errors->first('image')}}
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    
    @endsection