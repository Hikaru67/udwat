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
        <h3>Book List</h3>
      </div>
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Total Quantity</th>
            <th scope="col">Lent Quantity</th>
            <th scope="col" class="center">
              <a href="/book-master/books/new" style="display: inline-block; padding-right: 10px">
                Create
              </a>
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data['books'] as $book)
          <tr>
            <th scope="row">{{$book->id}}</th>
            <td>{{$book->title}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->category->name}}</td>
            <td>{{$book->total_quantity}}</td>
            <td>{{$book->lend_quantity}}</td>
            <td>
              <div class="action">
                <div class="action-item">
                  <a href="/book-master/books/{{$book->id}}">Edit</a>
                </div>
                <div class="action-item">
                <a href="/book-master/books/delete/{{$book->id}}">Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @if ($data['books']->lastPage() > 1)
          {{ $data['books']->render('vendor.pagination.bootstrap-4') }}
      @endif
    </div>
  </div>
@endsection