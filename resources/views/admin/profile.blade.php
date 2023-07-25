@extends('layouts.admin')

@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-6 m-auto">
            <h2>Profile</h2>
            <form method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Enter Name" value="{{ auth()->user()->name }}">
                    @error('name')
                    <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email" value="{{ auth()->user()->email }}">
                    @error('email')
                    <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
