@extends('layouts.master')

@section('title')
  <title>Book Manage | BMT</title>
@endsection

@section('title-content')
  Book Manage
@endsection

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="card-title center">
        <h3>Edit</h3>
      </div>
      <form action="/book-master/books/{{$book->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="title">Title</label>
          <input class="form-control" id="title" type="text" value="{{$book->title}}" name="title">
        </div>
        <div class="mb-3">
          <label class="input-label" for="inputGroupFile01">Image</label>
          <input class="form-control" id="inputGroupFile01" type="file" name="file_upload">
          <img src="{{url('/') . '/' . $book->image}}" class="img-responsive" width="150px" alt="">
        </div>
        <div class="mb-3">
          <label class="form-label" for="description">Description</label>
          <textarea class="form-control" id="description" rows="3" name="description">{{$book->description}}</textarea>
        </div>
        <div class="mb-3">
          <label class="form-label" for="category">Category</label>
          <select class="form-select" aria-label=Category" value="{{$book->category_id}}" name="category_id">
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ ($book->category_id == $category->id ? "selected":"") }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="total_quantity">Total Quantity</label>
          <input class="form-control" id="total_quantity" name="total_quantity" type="text" value="{{$book->total_quantity}}">
        </div>
        <div class="mb-3">
          <label class="form-label" for="lend_quantity">Lent Quantity</label>
          <input class="form-control" id="lend_quantity" name="lend_quantity" type="text" value="{{$book->lend_quantity}}">
        </div>
        <div class="center">
          <a href="." type="button" class="btn btn-secondary" data>Return</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
@endsection