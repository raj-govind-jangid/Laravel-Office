@extends('home.base')

@section('title')
<title>Edit User</title>
@endsection

@section('content')
<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Create User</h1>
    </header>
    <div class="row py-5">
      <div class="col-lg-6 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <div>
                <form action="/updateuser" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user['user_id'] }}">
                    <div class="form-group">
                      <label>Email address:</label>
                      <input type="email" class="form-control" name="email" value="{{ $user['user_email'] }}" required disabled>
                    </div>
                    <div class="form-group">
                      <label>First Name:</label>
                      <input type="text" class="form-control" name="firstname" value="{{ $user['user_first_name'] }}" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="lastname" value="{{ $user['user_last_name'] }}" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="number" class="form-control" name="phoneno" value="{{ $user['user_phoneno'] }}" required>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name='type'>
                            @if($user['user_type']=='Admin')
                            <option value="Admin" selected>Admin</option>
                            <option value="Superadmin">Superadmin</option>
                            @elseif($user['user_type']=='Superadmin')
                            <option value="Admin">Admin</option>
                            <option value="Superadmin" selected>Superadmin</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn">Update User</button>
                    <a href="/changepassword/{{$user['user_id']}}" class="btn">Change Password</a>
                  </form>
                </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
