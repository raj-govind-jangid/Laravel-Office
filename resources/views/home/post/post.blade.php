@extends('home.base')

@section('title')
<title>Post</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Post Lists</h1>
      <h4 class="lead mb-0" style="font-size: 30px;">Total Result : {{ $totalpost }}</h4>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <a href="/createpost" class="btn btn-primary mb-4 mr-auto">Create Post</a>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">Post Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($post as $post)
                    <tr>
                    <td>{{$post['post_name']}}</td>
                    <td>
                        <a href="/editpost/{{$post['post_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                        <a href="/deletepost/{{$post['post_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
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
