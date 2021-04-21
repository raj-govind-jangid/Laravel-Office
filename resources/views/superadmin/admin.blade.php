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
            <a href="/createuser" class="btn btn-primary mb-4 mr-auto">Create User</a>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Type</th>
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
                      <td>
                          <a href="/edituser/{{$user['user_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                          <a href="/deleteuser/{{$user['user_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
