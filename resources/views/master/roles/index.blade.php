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
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col" class="center">
              <a href="/book-master/roles/new" style="display: inline-block; padding-right: 10px">
                Create
              </a>
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data['roles'] as $role)
          <tr>
            <th scope="row">{{$role->id}}</th>
            <td class="name">{{$role->name}}</td>
            <td class="role">{{$role->roles}}</td>
            <td>
              <div class="action">
                <div class="action-item">
                  <a href="/book-master/roles/{{$role->id}}">Edit</a>
                </div>
                <div class="action-item">
                <a href="/book-master/roles/delete/{{$role->id}}">Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @if ($data['roles']->lastPage() > 1)
          {{ $data['roles']->render('vendor.pagination.bootstrap-4') }}
      @endif
    </div>
  </div>
@endsection