@extends('home.base')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div class="container pt-3">
    <h1 class="text-center">Most Recent Activity</h1>
    <hr>
    <div class="row mt-5 text-center">
        <div class="col-md-6">
            <div class="cart shadow p-3 bg-white">
                <h2>Working Employee</h2>
                <table class="table mt-4 table-striped">
                    <thead style="background-color: rgb(106, 90, 205); color: #fff;">
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Post</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($workingemployee) && count($workingemployee) > 0)
                    @foreach ($workingemployee as $workingemployee)
                    <tr>
                        <td>{{ $workingemployee['employee_first_name'] }} {{ $workingemployee['employee_last_name'] }}</td>
                        <td>{{ $workingemployee['department_name'] }}</td>
                        <td>{{ $workingemployee['post_name'] }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3">No Recent Activity Found</td>
                     </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="cart shadow p-3 bg-white">
                <h2>Pending Employee</h2>
                <table class="table mt-4 table-striped">
                    <thead style="background-color: rgb(106, 90, 205); color: #fff;">
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Post</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($pendingemployee) && count($pendingemployee) > 0)
                    @foreach ($pendingemployee as $pendingemployee)
                    <tr>
                        <td>{{ $pendingemployee['employee_first_name'] }} {{ $pendingemployee['employee_last_name'] }}</td>
                        <td>{{ $pendingemployee['department_name'] }}</td>
                        <td>{{ $pendingemployee['post_name'] }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3">No Recent Activity Found</td>
                     </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
