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
        <h3>Create</h3>
      </div>
      <form action="/book-master/roles/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="name">Name</label>
          <input class="form-control" id="name" type="text" value="{{old('name')}}" name="name">
          @error('name')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="roles">Roles</label>
          <input type="number" value="{{old('roles')}}" min="0" max="511" name="roles" id="roles" onchange="updateRole()">
          @error('roles')
            <span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div>
          @foreach ($rolesList as $key => $roleDetail)
            <div class="mb-3">
              <label class="form-label" style="padding-right: 20px">{{$key}}:</label>
              @foreach ($roleDetail as $key2 => $value)
                <div class="form-check form-check-inline">
                  <input class="form-check-input role-list" id="{{$key .'_'. $key2}}" type="checkbox" value="{{bindec($value)}}" onchange="calRoles()" {{ (old('roles') & bindec($value) ? "checked":"") }}>
                  <label class="form-check-label" for="{{$key .'_'. $key2}}">{{$key2}}</label>
                </div>
              @endforeach
            </div>
          @endforeach
        </div>

        <div class="center">
          <a href="." type="button" class="btn btn-secondary" data>Return</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
@endsection

<script type="text/javascript">
  function calRoles() {
    let roles = document.getElementById('roles')
    let total = 0;
    let roleList = document.querySelectorAll('.role-list')
    for(i=0; i<roleList.length; i++){
      if (roleList[i].checked) {
        total += parseInt(roleList[i].value)
      }
    }
    roles.value = total
    console.log('=>>> ~ total', total)
    console.log(document.getElementById('roles-output').value)
    document.getElementById('roles-output').value = total

    return total
  }

  function updateRole() {
    let roles = document.getElementById('roles')
    const roleList = document.querySelectorAll('.role-list')
    for(i=0; i<roleList.length; i++){
      roleList[i].checked = false
      if (roleList[i].value & roles.value) {
        roleList[i].checked = true
      }
    }
  }
</script>