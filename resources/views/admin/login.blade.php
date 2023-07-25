@extends('layouts.admin')

@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-6 m-auto">
            <form method="POST" action="{{ route('admin.do_login') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                        @error('email')
                        <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @error('password')
                        <small id="emailHelp" class="form-text text-muted">{{ $message  }}</small>
                        @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
