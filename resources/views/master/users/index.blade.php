@extends('layouts.master')

@section('title')
  <title>User Manage | BMT</title>
@endsection

@section('title-content')
  Book Manage
@endsection

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="card-title center">
        <h3>User List</h3>
      </div>
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col" class="center">
              <a href="/book-master/users/new" style="display: inline-block; padding-right: 10px">
                Create
              </a>
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data['users'] as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->address}}</td>
            <td>
              <div class="action">
                <div class="action-item">
                  <a href="/book-master/users/{{$user->id}}">Edit</a>
                </div>
                <div class="action-item">
                <a href="/book-master/users/delete/{{$user->id}}">Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @if ($data['users']->lastPage() > 1)
          {{ $data['users']->render('vendor.pagination.bootstrap-4') }}
      @endif
    </div>
  </div>
@endsection