<?php
use App\Http\Controllers\UserController;
?>
@extends('home.base')

@section('title')
<title>Admin User</title>
@endsection

@section('content')

<div class="container py-5">
    <header class="text-center text-white">
      <h1 class="display-4">User Lists</h1>
      <h4 class="lead mb-0" style="font-size: 30px;">Total Result : {{ $totaluser }}</h4>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-5 bg-white rounded">
            <a href="/createuser" class="btn mb-4 mr-auto">Create User</a>
            <a href class="btn mb-4 mr-auto" data-toggle="modal" data-target="#myModal">Search Filter</a>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped text-center">
                <thead style="background-color: rgb(106, 90, 205); color: #fff;">
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                    <tr>
                      <td>{{ $user['user_email'] }}</td>
                      <td>{{ $user['user_first_name'] }} {{ $user['user_last_name'] }} </td>
                      <td>{{ $user['user_phoneno'] }}</td>
                      <td>{{ $user['user_type'] }}</td>
                      <td><b><?php echo UserController::userstatus($user['user_email']) ?></b></td>
                      <td>
                          <a href="/edituser/{{$user['user_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                          <a href="/deleteuser/{{$user['user_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
                <ul class="pagination">
                    @if($page >= 2)
                    <li class="page-item"><a class="page-link" href="/searchuser/{{ $page-1 }}?email={{$email}}&firstname={{$firstname}}&lastname={{$lastname}}&phoneno={{$phoneno}}&type={{$type}}">Previous</a></li>
                    @endif
                    @for($i = 1; $i <= $number_of_page; $i++)
                    @if($page == $i)
                    <li class="page-item active"><a class="page-link" href="/searchuser/{{ $page }}?email={{$email}}&firstname={{$firstname}}&lastname={{$lastname}}&phoneno={{$phoneno}}&type={{$type}}">{{$i}}</a></li>
                    @continue
                    @endif
                    <li class="page-item"><a class="page-link" href="/searchuser/{{ $i }}?email={{$email}}&firstname={{$firstname}}&lastname={{$lastname}}&phoneno={{$phoneno}}&type={{$type}}">{{$i}}</a></li>
                    @endfor
                    @if($page < $number_of_page)
                    <li class="page-item"><a class="page-link" href="/searchuser/{{ $page+1 }}?email={{$email}}&firstname={{$firstname}}&lastname={{$lastname}}&phoneno={{$phoneno}}&type={{$type}}">Next</a></li>
                    @endif
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Search User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="/searchuser" method="GET">
                <div class="form-group">
                  <label>Email ID:</label>
                  <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ $email }}">
                </div>
                <div class="form-group">
                  <label>First Name:</label>
                  <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" value="{{ $firstname }}">
                </div>
                <div class="form-group">
                  <label>Last Name:</label>
                  <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" value="{{ $lastname }}">
                </div>
                <div class="form-group">
                  <label>Phone No:</label>
                  <input type="text" class="form-control" placeholder="Enter Phone" name="phoneno" value="{{ $phoneno }}">
                </div>
                <div class="form-group">
                  <label>User Type:</label>
                  <select class="form-control" name="type" value="{{ $type }}">
                    @if($type == "Admin")
                    <option value="All">All</option>
                    <option value="Admin" selected>Admin</option>
                    <option value="Superadmin">Superadmin</option>
                    @elseif($type == "Superadmin")
                    <option value="All">All</option>
                    <option value="Admin">Admin</option>
                    <option value="Superadmin" selected>Superadmin</option>
                    @else
                    <option value="All" selected>All</option>
                    <option value="Admin">Admin</option>
                    <option value="Superadmin">Superadmin</option>
                    @endif
                  </select>
                </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn">Apply Search</button>
          </form>
          <button type="button" class="btn" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

@endsection
