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
      <form action="/book-master/users/{{$user->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="email">Username</label>
          <p>{{$user->username}}</p>
        </div>
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control" id="email" type="text" value="{{$user->email}}" name="email">
          @error('email')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="category">Role</label>
          <select class="form-select" aria-label=Role" value="{{$user->role_id}}" name="role_id">
            @foreach($roles as $role)
              <option value="{{ $role->id }}" {{ ($user->role_id == $role->id ? "selected":"") }}>{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="phone">Phone</label>
          <input class="form-control" id="phone" name="phone" type="text" value="{{$user->phone}}">
          @error('phone')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="address">Adress</label>
          <input class="form-control" id="address" name="address" type="text" value="{{$user->address}}">
          @error('address')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="center">
          <a href="." type="button" class="btn btn-secondary" data>Return</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
@endsection