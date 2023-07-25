@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-8 m-auto">
            <h2>User List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>

                        <td>{!! $user->status ? '<span class="badge badge-success">Approved</span>' : '<span class="badge badge-danger">Reject</span>' !!}</td>
                        <td>
                            <a href="{{ route('admin.user.edit',$user) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
