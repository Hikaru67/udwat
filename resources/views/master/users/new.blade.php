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
      <form action="/book-master/users/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="email">Username</label>
          <input class="form-control" id="email" type="text" value="{{old('username')}}" name="username">
          @error('username')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control" id="email" type="text" value="{{old('email')}}" name="email">
          @error('email')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input class="form-control" id="password" type="password" value="{{old('password')}}" name="password">
          @error('password')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="password_confirmation">Password Confirmation</label>
          <input class="form-control" id="password_confirmation" type="password" value="{{old('password_confirmation')}}" name="password_confirmation">
        </div>
        <div class="mb-3">
          <label class="form-label" for="category">Category</label>
          <select class="form-select" aria-label=Role" value="{{old('role_id')}}" name="role_id">
            @foreach($roles as $role)
              <option value="{{ $role->id }}" {{ (old('role_id') == $role->id ? "selected":"") }}>{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
        <label class="form-label" for="phone">Phone</label>
          <input class="form-control" id="phone" name="phone" type="text" value="{{old('phone')}}">
          @error('phone')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
        <label class="form-label" for="address">Adress</label>
          <input class="form-control" id="address" name="address" type="text" value="{{old('address')}}">
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