@extends('home.base')

@section('title')
<title>Edit Post</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Edit Post</h1>
    </header>
    <div class="row py-5">
      <div class="col-lg-6 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <div>
                <form action="/updatepost" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $item['post_id'] }}">
                    <div class="form-group">
                        <label>Post Name:</label>
                        <input type="text" class="form-control" name="post_name" value="{{ $item['post_name'] }}" required>
                    </div>
                    <button class="btn">Edit Post</button>
                </form>
                </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
