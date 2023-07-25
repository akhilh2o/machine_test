
@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-6 m-auto">
            <h2>User</h2>
            <form method="POST" action="{{ route('admin.user.update',$user) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Enter Name" value="{{ $user->name }}">
                    @error('name')
                    <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email" value="{{ $user->email }}">
                    @error('email')
                    <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="phone" name="mobile" class="form-control" id="mobile" aria-describedby="emailHelp"
                        placeholder="Enter Mobile" value="{{ $user->mobile }}">
                    @error('mobile')
                    <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" @selected($user->status==true)> Approved</option>
                        <option value="0" @selected($user->status==false)> Reject</option>
                    </select>
                    @error('mobile')
                    <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
